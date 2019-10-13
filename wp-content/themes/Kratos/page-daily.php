<?php
/*
Template Name: 日报模版
*/
$page_side_bar = kratos_option('page_side_bar');
$page_side_bar = (empty($page_side_bar)) ? 'right_side' : $page_side_bar;
get_header();
get_header('banner'); ?>
<div id="kratos-blog-post" style="background:<?php echo kratos_option('background_index_color'); ?>">
	<div class="container">
		<div class="row">
			<?php if($page_side_bar == 'left_side'){ ?>
				<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
	                <div id="sidebar">
	                    <?php dynamic_sidebar('sidebar_tool'); ?>
	                </div>
	            </aside>
			<?php } ?>
            <section id="main" class='<?php echo ($page_side_bar == 'single') ? 'col-md-12' : 'col-md-8'; ?>'>
				<article>
					<div class="kratos-hentry kratos-post-inner clearfix">
          <header class="kratos-entry-header">
            <h1 class="kratos-entry-title text-center">派学日报 第<?php echo floor((strtotime(date("Y-m-d"))-strtotime("2018-10-01"))/86400) ?>期</h1>
            <div class="kratos-post-meta text-center">
              <span>
                <i class="fa fa-calendar"></i> <?php echo date("Y年m月d日"); ?>
                <i class="fa fa-eye"></i> <?php echo kratos_get_post_views();?>次浏览
              </span>
            </div>
          </header>
            <div class="kratos-post-content">
              <p>每天，我们会从大量信息源中为你精心挑选有价值阅读的技术文章，中英文都会有 – 都是有关编程总结、技术趋势、开发技巧等主题的文章。

              <p>当然，还会有很多有趣的东西，大家拭目以待吧:)</p>

              <p><hr></p>
              <?php if ( kratos_option('ad_show_1') ): ?>
                <a href="<?php echo kratos_option('ad_link_1'); ?>"><img src="<?php echo kratos_option('ad_img_1')?>"></a>
              <?php endif ?>
              <?php
                $args=array(
                    'cat' => 37,   // 分类ID
                    'posts_per_page' => 10, // 显示篇数
                    'post_date' => date("Y-m-d")
                );
                query_posts($args);
                if(have_posts()) : while (have_posts()) : the_post();
              ?>
                <p style="margin-bottom:5px"><b><?php the_title(); ?></b></p>
                <p style="margin-bottom:5px"><?php if ( get_the_tags() ) { the_tags('标签：', ' ', ''); }?></p>
                <p style="margin-bottom:25px">简介：<?php echo wp_trim_words(get_the_excerpt(), 68); ?><a target="_blank" href="<?php $reg="/href=\"([^\"]+)/";preg_match($reg, get_the_content(), $a); echo substr($a[0], 6); ?>">原文链接</a></p>
              <?php  endwhile; endif; wp_reset_query(); ?>
              <p class="text-center"><a class="more" target="_blank" href="/learn/daily" style="border: 1px solid #ef7042; padding: 4px 12px;"><i class="fa fa-random" style="font-size: 12px; margin-right: 4px;"></i>往期更多</a></p>
              <p><hr></p>
              <?php if ( kratos_option('ad_show_2') ): ?>
                <a href="<?php echo kratos_option('ad_link_2'); ?>"><img src="<?php echo kratos_option('ad_img_2')?>"></a>
              <?php endif ?>
						</div>
						<?php if(kratos_option('page_like_donate')||kratos_option('page_share')) {?>
						<footer class="kratos-entry-footer clearfix">
								<div class="post-like-donate text-center clearfix" id="post-like-donate">
								<?php if ( kratos_option( 'page_like_donate' ) ) : ?>
					   			<a href="<?php echo kratos_option('donate_links'); ?>" class="Donate"><i class="fa fa-bitcoin"></i> 打赏</a>
					   			<?php endif; ?>
								<?php if ( kratos_option( 'page_share' ) ) : ?>
								<a href="javascript:;"  class="Share" ><i class="fa fa-share-alt"></i> 分享</a>
									<?php require_once( get_template_directory() . '/inc/share.php'); ?>
								<?php endif; ?>
					    		</div>
						</footer>
						<?php }?>
					</div>
						<?php if ( kratos_option( 'page_cc' ) ) : ?>
						<div class="kratos-hentry kratos-copyright text-center clearfix">
							<img alt="知识共享许可协议" src="<?php echo get_template_directory_uri(); ?>/images/licenses.png">
							<h5>本作品采用 <a rel="license nofollow" target="_blank" href="http://creativecommons.org/licenses/by-sa/4.0/">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可</h5>
						</div>
						<?php endif; ?>
						<?php comments_template(); ?>
				</article>
			</section>
			<?php if($page_side_bar == 'right_side'){ ?>
			<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                <div id="sidebar">
                    <?php dynamic_sidebar('sidebar_tool'); ?>
                </div>
            </aside>
			<?php } ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>