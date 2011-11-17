<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PyroCMS
 *
 * An open source CMS based on CodeIgniter
 *
 * @package		PyroCMS
 * @author		PyroCMS Dev Team
 * @license		Apache License v2.0
 * @link		http://pyrocms.com
 * @since		Version 0.9.8-rc2
 * @filesource
 */

/**
 * PyroCMS Forums Admin Controller
 *
 * Provides an admin for the forums module.
 *
 * @author		Dan Horrigan <dan@dhorrigan.com>
 * @package		PyroCMS
 * @subpackage		Forums
 */
class Admin extends Admin_Controller {

	/**
	 * @access	private
	 * @var		array	Contains form validation rules.
	 */
	private $rules = array(
					'category' => array (
							array (
								'field'   => 'title',
								'label'   => 'lang:forums_title_label',
								'rules'   => 'trim|xss_clean|required|max_length[100]'
							)
						),
					'forum' => array (
							array (
								'field'   => 'title',
								'label'   => 'lang:forums_title_label',
								'rules'   => 'trim|xss_clean|required|max_length[100]'
							),
							array (
								'field'   => 'description',
								'label'   => 'lang:forums_description_label',
								'rules'   => 'trim|xss_clean|required|max_length[255]'
							),
							array(
								'field' => 'category',
								'label' => 'lang:forums_category_label',
								'rules' => 'numeric'
							),
							array(
								'field' => 'moderators',
								'label' => 'lang:forums_moderators_label',
								'rules' => ''
							),
							array(
								'field' => 'permissions',
								'label' => 'lang:forums_permissions_label',
								'rules' => ''
							),
							array(
								'field' => 'is_closed',
								'label' => 'lang:forums_closed_label',
								'rules' => 'numeric'
							)
						)
		);

	/**
	 * Constructor
	 *
	 * Loads dependencies.
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array('forums_m',
								 'forum_categories_m',
								 'groups/group_m',
								 'forum_permissions_m',
								 'forum_moderators_m'
								)
							);
		
		$this->load->helper('users/user');
		
		$this->lang->load('forums');
		
		$users = $this->ion_auth->get_users();
		
		$moderator_options = array();
		
		foreach($users as $user)
		{
			$moderator_options[$user->id] = empty($user->display_name) ? $user->username : $user->display_name ;
		}
	
		asort($moderator_options);
		
		$this->template->moderator_options = $moderator_options;
		
		$groups = $this->group_m->get_all();
		
		foreach($groups as $group)
		{
			$group_options[$group->id] = $group->name;
		}
		
		$this->template->group_options = $group_options;

		$this->template->append_metadata( js('admin.js', 'forums') )
				->set_partial('shortcuts', 'admin/partials/shortcuts');
	}
	
	/**
	 * Index
	 *
	 * Lists categories.
	 *
	 * @access	public
	 * @return	void
	 */
	public function index()
	{
		$categories = $this->forum_categories_m->get_all();
		
		$this->template
				->set('categories', $categories)
				->build('admin/index');
	}

	/**
	 * List Forums
	 * 
	 * Lists all the forums.
	 * 
	 * @access	public
	 * @return	void
	 */
	public function list_forums($cat_id = FALSE)
	{
		$category = $this->forum_categories_m->get($cat_id);
		
		empty($category) and redirect('admin/forums');
		
		$forums = $this->forums_m->get_forums($cat_id);
		
		$this->template
				->set('category_title', $category->title)
				->set('forums', $forums)
				->build('admin/forums');
	}

	/**
	 * Create Category
	 *
	 * Displays a form to create a category.
	 * Creates the category if it passes form validation.
	 *
	 * @todo	Check for duplicate categories.
	 * @access	public
	 * @return	void
	 */
	public function create_category()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules['category']);

		$category->id = 0;
		$category->title = set_value('title');

		if ($this->form_validation->run())
		{
			if($this->forum_categories_m->insert(array('title' => $this->input->post('title'))))
			{
				$this->session->set_flashdata('success', sprintf(lang('forums_category_add_success'), $this->input->post('title')));
				redirect('/admin/forums');
			}
		}

		$this->template
				->set('category', $category)
				->build('admin/category_form');
	}

	/**
	 * Edit Category
	 * 
	 * Allows admins to edit a category
	 * 
	 * @param	int	The id of the category to edit.
	 * @access	public
	 * @return void
	 */
	public function edit_category($id = FALSE)
	{
		//redirect if id isn't set
		!$id and redirect('admin/forums');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules['category']);

		$category = $this->forum_categories_m->get($id);

		if ($this->form_validation->run())
		{

			if($this->forum_categories_m->update($this->input->post('id'), array('title' => $this->input->post('title'))))
			{
				$this->session->set_flashdata('success', sprintf(lang('forums_category_edit_success'), $this->input->post('title')));
				redirect('/admin/forums');
			}
			$category->title = set_value('title');
		}
		
		$this->template
				->set('category', $category)
				->build('admin/category_form');
	}

	/**
	 * Create Forum
	 *
	 * Displays a form to create a forum.
	 * Creates the forum if it passes form validation.
	 *
	 * @todo	Check for duplicate forums.
	 * @access	public
	 * @return	void
	 */
	public function create_forum($category_id = FALSE)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules['forum']);

		$forum->id = 0;
		
		foreach($this->rules['forum'] as $key => $rule)
		{
			$forum->{$rule['field']} = $this->input->post($rule['field'], TRUE);
		}

		$forum->categories = $this->forum_categories_m->dropdown('id', 'title');
		
		if ($this->form_validation->run())
		{
			if($this->forums_m->insert(array('is_closed' => $this->input->post('is_closed'), 'title' => $this->input->post('title'), 'description' => $this->input->post('description'), 'category_id' => $this->input->post('category'))))
			{
				$this->session->set_flashdata('success', sprintf(lang('forums_forum_add_success'), $this->input->post('title')));
				redirect('/admin/forums/list_forums/'.$this->input->post('category'));
			}

		}

		$this->template
				->set('forum', $forum)
				->set('category_id', $category_id)
				->build('admin/forum_form');
	}

	/**
	 * Edit Forum
	 *
	 * Allows admins to edit forums.
	 *
	 * @param	int	The id of the forum to edit.
	 * @access	public
	 * @return	void
	 */
	public function edit_forum($id = FALSE)
	{
		!$id and redirect('admin/forums');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->rules['forum']);

		$forum = $this->forums_m->get($id);
		
		$permissions = $this->forum_permissions_m->get_many_by('forum_id', $id);
		$forum->permissions = array();
		
		if(!empty($permissions))
		{
			foreach($permissions as $item)
			{
				$forum->permissions[] = $item->group_id;
			}
		}
		
		$moderators = $this->forum_moderators_m->get_many_by('forum_id', $id);
		$forum->moderators = array();
		
		if(!empty($moderators))
		{
			foreach($moderators as $item)
			{
				$forum->moderators[] = $item->user_id;
			}
		}
		
		$forum->categories = $this->forum_categories_m->dropdown('id', 'title');
		
		if ($this->form_validation->run())
		{
			foreach($this->rules['forum'] as $key => $rule)
			{
				$forum->{$rule['field']} = $this->input->post($rule['field'], TRUE);
			}
			
			if($this->forums_m->update($this->input->post('id'), array('is_closed' => $this->input->post('is_closed'), 'title' => $this->input->post('title'), 'description' => $this->input->post('description'), 'category_id' => $this->input->post('category'))))
			{
				$this->_update_permissions($this->input->post('id'));
				$this->_update_moderators($this->input->post('id'));
				$this->session->set_flashdata('success', sprintf(lang('forums_forum_add_success'), $this->input->post('title')));
				redirect('/admin/forums/list_forums/'.$this->input->post('category'));
			}
			$forum->title = set_value('title');
			$forum->description = set_value('description');
			$forum->category = set_value('category');
		}
		$forum->category = $forum->category_id;
		
		$this->template
				->set('forum', $forum)
				->set('category_id', $forum->category_id)
				->build('admin/forum_form');
	}

	/**
	 * Delete
	 *
	 * This deletes both categories and forums (based on $type).
	 * It recursivly deletes all children.
	 *
	 * @param	string	The type of item to delete.
	 * @param	int		The id of the category or forum to delete.
	 * @access	public
	 * @return	void
	 */
	public function delete($type, $id)
	{
		switch ($type) {
			// Delete the category
			case 'category':
				$this->load->model('forum_posts_m');
				$this->load->model('forum_subscriptions_m');

				// Delete the category
				$this->forum_categories_m->delete($id);

				// Loop through all the forums in the category
				foreach($this->forums_m->get_many_by('category_id =', $id) as $forum)
				{
					// Loop through all the topics in the forum
					foreach($this->forum_posts_m->get_many_by(array('forum_id' => $forum->id, 'parent_id' => '0')) as $topic)
					{
						// Delete the subscriptions to the topic
						$this->forum_subscriptions_m->delete_by('topic_id', $topic->id);
					}
					// Delete all the topics and replies
					$this->forum_posts_m->delete_by('forum_id', $forum->id);
				}

				// Delete all the forums
				$this->forums_m->delete_by('category_id =', $id);

				$this->session->set_flashdata('success', lang('forums_category_delete_success'));
				redirect('/admin/forums');
				break;

			// Delete the forum
			case 'forum':
				$this->load->model('forum_posts_m');
				$this->load->model('forum_subscriptions_m');

				// Delete the forum
				$this->forums_m->delete($id);

				// Loop through all the topics in the forum
				foreach($this->forum_posts_m->get_many_by(array('forum_id' => $id, 'parent_id' => '0')) as $topic)
				{
					// Delete the subscriptions to the topic
					$this->forum_subscriptions_m->delete_by('topic_id', $topic->id);
				}
				
				// Delete all the topics
				$this->forum_posts_m->delete_by('forum_id', $id);

				$this->session->set_flashdata('success', lang('forums_forum_delete_success'));
				redirect('/admin/forums/list_forums');
				break;

			default:
				break;
		}
	}
	
	/**
	 * Update forum order position
	 */
	public function ajax_forum_order()
	{
		$ids = explode(',', $this->input->post('order'));
		
		$i = 1;
		
		foreach($ids as $id)
		{
			// Update the position
			$this->forums_m->update_order($id, $i);
			++$i;
		}
	}
	
	/**
	 * Update Category order position
	 */
	public function ajax_category_order()
	{
		$ids = explode(',', $this->input->post('order'));
		
		$i = 1;
		
		foreach($ids as $id)
		{
			// Update the position
			$this->forum_categories_m->update_order($id, $i);
			++$i;
		}
	}
	
	private function _update_permissions($forum_id = FALSE)
	{
		//delete previous permissions
		$this->forum_permissions_m->delete_by('forum_id', $forum_id);
		
		if($forum_id and $permissions = $this->input->post('permissions'))
		{			
			//insert new permissions
			foreach($permissions as $group_id)
			{
				$this->forum_permissions_m->insert(array('forum_id' => $forum_id, 'group_id' => $group_id));
			}
		}
	}
	
	private function _update_moderators($forum_id = FALSE)
	{
		//delete previous moderators
		$this->forum_moderators_m->delete_by('forum_id', $forum_id);
		
		if($forum_id and $moderators = $this->input->post('moderators'))
		{			
			//insert new moderators
			foreach($moderators as $user_id)
			{
				$this->forum_moderators_m->insert(array('forum_id' => $forum_id, 'user_id' => $user_id));
			}
		}
	}
}
/* End of file controllers/admin.php */
