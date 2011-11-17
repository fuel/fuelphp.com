<div class="blog_post">
	<!-- Post heading -->
	<div class="post_heading">
		<h2><?php echo $post->title; ?></h2>
		<p class="post_date"><?php echo lang('blog_posted_label');?>: <?php echo format_date($post->created_on); ?></p>
		<?php if($post->category->slug): ?>
		<p class="post_category">
			<?php echo lang('blog_category_label');?>: <?php echo anchor('blog/category/'.$post->category->slug, $post->category->title);?>
		</p>
		<?php endif; ?>
	</div>
	<div class="post_body">
		<?php echo stripslashes($post->body); ?>
	</div>
</div>
<div id="disqus_thread"></div>
<script type="text/javascript">
    var disqus_shortname = 'fuelphpblog';
    var disqus_identifier = '<?php echo $post->slug; ?>';
    var disqus_url = '<?php echo current_url(); ?>';
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>