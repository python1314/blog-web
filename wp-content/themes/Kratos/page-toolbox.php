<?php
/*
Template Name: 工具箱模版
*/
get_header();
get_header('banner'); ?>
<div id="kratos-blog-toolbox" style="background:<?php echo kratos_option('background_index_color'); ?>">
	<div class="container">
        <aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
            <div id="sidebar"  class="col-md-12 module module-blog">
                <h4>派学日记 <a class="more" target="_blank" title="阅读更多" href="/learn/daily"><i class="fa fa-angle-right"></i></a></h4>
                <ul>
                <?php
                    $args=array(
                        'cat' => 37,   // 分类ID
                        'posts_per_page' => 15, // 显示篇数
                    );
                    query_posts($args);
                    if(have_posts()) : while (have_posts()) : the_post();
                ?>
                    <li>
                        <a target="_blank" href="<?php $reg="/href=\"([^\"]+)/";preg_match($reg, get_the_content(), $a); echo substr($a[0], 6); ?>">
                            <?php echo wp_trim_words(the_title(), 16); ?>
                        </a>
                    </li>
                <?php  endwhile; endif; wp_reset_query(); ?>
                </ul>
            </div>
        </aside>
        <section id="main" class='col-md-8'>
            <div class="row module module-tool" style="margin-bottom: 15px;">
                <div class="col-md-12">
                    <h4>派学利器 <select class="more"><option>博客导航</option><option>工具链接</option><option>书籍推荐</option></select></h4>
                    <ul>
                    <?php
                        $args=array(
                            'cat' => 36,   // 分类ID
                            'posts_per_page' => 6, // 显示数量
                        );
                        query_posts($args);
                        if(have_posts()) : while (have_posts()) : the_post();
                    ?>
                        <li class="col-md-2 col-xs-6">
                            <a target="_blank" class="link" href="<?php echo wp_trim_words(get_the_excerpt(), kratos_option('post_trim')); ?>">
                                <?php the_post_thumbnail(); ?>
                                <span><?php the_title(); ?></span>
                            </a>
                        </li>
                    <?php  endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
            <div class="row module">
                <div class="col-md-12">
                    <h4>Github精选 <select class="more"><option>All</option><option>JavaScript</option><option>Python</option><option>Java</option></select></h4>
                    <ul style="padding-bottom: 15px;">
                        <li class="col-md-12 text-center">加载失败</li>
                    </ul>
                </div>
            </div>
        </section>
	</div>
</div>
<?php get_footer(); ?>