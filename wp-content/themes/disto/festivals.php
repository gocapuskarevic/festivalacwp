<?php
/*
  Template Name: Festivals overview
*/
get_header();
$cat = get_terms( 'category', array(
  'hide_empty' => false,
) );
$countries = get_terms( 'locations', array(
  'hide_empty' => false,
) );
$months = get_terms( 'months', array(
  'hide_empty' => false,
) );
$genres = get_terms( 'genres', array(
  'hide_empty' => false,
) );
$nums = get_terms( 'numberofdays', array(
  'hide_empty' => false,
) );
$campings = get_terms( 'camping', array(
  'hide_empty' => false,
) );
$sizes = get_terms( 'sizes', array(
  'hide_empty' => false,
) );
$other = get_terms( 'miscellaneous', array(
  'hide_empty' => false,
) );
?>
<div class="container">
  <div class="row">
    <div class="festivals-all">
      <?php get_template_part('single-header-7'); ?>

      <section id="content_main" class="clearfix jl_spost">
        <div class="heading-section">
          <h2>Pretraga</h2>
          <a  href="<?php echo get_site_url().'/agenda' ?>" class="reset-button">Resetuj</a>
        </div>
        <div class="agenda-filters">
          <div class="row">

            <div class="col-lg-4 col-md-6 col-xs-12">
              <div class="choise-wrapper">
                <p>Država</p>
                <select id="country" class="js-basic-dropdown">
                  <option value="0">Svi</option>
                  <?php
                    foreach( $countries as $country )
                      echo '<option value="'.$country->term_id.'">' . $country->name . '</option>';
                  ?>
                </select>
              </div>
            </div>
          
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="choise-wrapper">
              <p>Festival</p>
              <select id="category" class="js-basic-dropdown">
                <option value="0">Svi</option>
                <?php
                  foreach( $cat as $c )
                    echo '<option value="'.$c->term_id.'">' . $c->name . '</option>';
                ?>
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="choise-wrapper">
              <p>Mesec</p>
              <select id="month" class="js-basic-dropdown">
                <option value="0">Svi</option>
                <?php
                  foreach( $months as $month )
                    echo '<option value="'.$month->term_id.'">' . $month->name . '</option>';
                ?>
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="choise-wrapper">
              <p>Trajanje</p>
              <select id="numofdays" class="js-basic-dropdown">
                <option value="0">Svi</option>
                <?php
                  foreach( $nums as $num )
                    echo '<option value="'.$num->term_id.'">' . $num->name . '</option>';
                ?>
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="choise-wrapper">
              <p>Žanr</p>
              <select id="genre" class="js-basic-dropdown">
                <option value="0">Svi</option>
                <?php
                  foreach( $genres as $genre )
                    echo '<option value="'.$genre->term_id.'">' . $genre->name . '</option>';
                ?>
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="choise-wrapper">
              <p>Kampovanje</p>
              <select id="campaing" class="js-basic-dropdown">
                  <option selected="true" value="0">Ne</option>
                <?php
                  foreach( $campings as $camping )
                    echo '<option value="'.$camping->term_id.'">' . $camping->name . '</option>';
                ?>
              </select>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="choise-wrapper">
              <p>Kapacitet</p>
              <select id="size" class="js-basic-dropdown">
                <option value="0">Svi</option>
                <?php
                  foreach( $sizes as $size )
                    echo '<option value="'.$size->term_id.'">' . $size->name . '</option>';
                ?>
              </select>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="choise-wrapper">
              <p>Ostalo</p>
              <select id="other" class="js-basic-dropdown">
                <option value="0">Svi</option>
                <?php
                  foreach( $other as $o )
                    echo '<option value="'.$o->term_id.'">' . $o->name . '</option>';
                ?>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 btn-wrapper">
            <div class="choise-wrapper choise-button">
              <a id="search" class="btn-primary" type="button">Prikaži</a>
            </div>
          </div>
        </div>

        
        <div id="result-wrapper">

        </div>

        </div>
      </section>
  </div>
  <!-- end of filters -->
  </div>
</div>

<?php
  //$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $args = array(
    'post_type'       => 'festivals',
    'post_status'     => 'publish',
    'meta_key'        => 'start_date',
	  'orderby'         => 'meta_value_num',
	  'order'           => 'ASC',
    'posts_per_page'  => 12,
    'paged'           => 1,
  );

//var_dump($args);
$all_festivals = new WP_Query($args); ?>

<div id="main-default-wrapper">
  <?php if ($all_festivals->have_posts()) : ?>
    <div class="content-festivals">
      <div class="container">
        <div class="row">
          <?php while ($all_festivals->have_posts()) : $all_festivals->the_post(); ?>
            <?php
              $year = get_the_terms( get_the_ID(), 'years' );
              $date_s = get_field('start_date');
              $date_e = get_field('end_date');
              $location = get_the_terms( get_the_ID(), 'locations' );
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="post_grid_content_wrapper">
                <?php if ( has_post_thumbnail()) {?>
                  <div class="image-post-thumb">
                    <a href="<?php the_permalink(); ?>" class="link_image featured-thumbnail" title="<?php the_title_attribute(); ?>">
                      <?php the_post_thumbnail('disto_large_feature_image');?>
                      <div class="background_over_image"></div>
                    </a>
                  </div>
                <?php }?>
                <div class="post-entry-content">
                  <div class="post-entry-content-wrapper">
                    <div class="large_post_content">
                      <?php echo disto_post_meta_dc(get_the_ID()); ?>
                      <h3 class="image-post-title">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                          <?php if($year) : ?>
                            <span><?php echo $year[0]->name; ?></span>
                          <?php endif; ?>
                        </a>
                      </h3>
                      <div class="e-data">
                      <?php if( $date_s && $date_e)
                        echo '<span class="festival-data">'. $date_s.' - '. $date_e .'</span>';
                      ?>
                      <?php if( $location)
                        echo '<p">'. $location[0]->name .'</p>';
                      ?>
                      </div>                 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
  <?php endif; ?>
</div></div>
<div class="container">
  <div class="row">
    <div class="c-pagination">
        <?php 
            html5wp_pagination($all_festivals); wp_reset_postdata(); 
        ?>
    </div>
  </div>
</div>
  

<?php get_footer(); ?>
