<?php
                    $args = array(
                        'posts_per_page' => 4,
                        'post_type'     => 'festivals',
                        'order_by'      => 'date',
                        'order'   => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'miscellaneous',
                                'field' => 'slug',
                                'terms' => 'u-fokusu', 
                            )
                        )
                    );

                    $post_query = new Wp_query( $args );
                    ?>
                    <div class="featured-blocks-wrapper">
<div class="row">
                    <h3>U fokusu</h3>
                    <?php
                    foreach( $post_query->posts as $post ) : setup_postdata( $post );
                    $post_id = get_the_ID();
                    ?>
                    <div class="col-md-3">
                        <div class="jl_related_feature_items">
                            <div class="jl_related_feature_items_in">
                                <?php if ( has_post_thumbnail()) : ?>
                                    <div class="image-post-thumb">
                                        <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('disto_large_feature_image');?>
                                            <div class="background_over_image"></div>
                                        </a>
                                    </div>
                                    <?php 
                                    echo disto_post_type();
                                    ?>
                                <?php endif; ?>
                                <div class="post-entry-content">        
                                    <h3 class="jl-post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title()?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <a href="/agenda/" class="btn-primary-blue">Pogledaj sve festivale</a>
                </div>
                </div>