<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 * Template Name: Page CV & Parcours
 */
$option_name      = get_field_object('profile-name');
$option_dob       = get_field_object('profile-dob');
$option_address   = get_field_object('general-address', 'option');
$option_email     = get_field_object('general-email', 'option');
$option_skype     = get_field_object('profile-skype');
$option_contract  = get_field_object('profile-contract');
get_header(); ?>
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <div class="block-content">
  <h2 class="block-title"><?php the_title(); ?></h2>
  <?php the_content(); ?>
  <div class="info-list row">
      <?php if($option_name['value']) { ?><div class="col-sm-6"><span><?php echo $option_name['label'] ?> : </span> <?php echo $option_name['value'] ?></div><?php } ?>
      <?php if($option_dob['value']) { ?><div class="col-sm-6"><span><?php echo $option_dob['label'] ?> : </span> <?php echo $option_dob['value'] ?></div><?php } ?>
      <?php if($option_address['value']) { ?><div class="col-sm-6"><span><?php echo $option_address['label'] ?> : </span> <?php echo $option_address['value'] ?></div><?php } ?>
      <?php if($option_email['value']) { ?><div class="col-sm-6"><span><?php echo $option_email['label'] ?> : </span> <?php echo $option_email['value'] ?></div><?php } ?>
      <?php if($option_skype['value']) { ?><div class="col-sm-6"><span><?php echo $option_skype['label'] ?> : </span> <?php echo $option_skype['value'] ?></div><?php } ?>
      <?php if($option_contract['value']) { ?><div class="col-sm-6"><span><?php echo $option_contract['label'] ?> : </span> <?php echo $option_contract['value'] ?></div><?php } ?>
  </div>
</div>
<?php if( have_rows('skillsets') ): ?>
  <div class="block-content">
      <h3 class="block-title"><?php echo __('Compétences', 'cc2017'); ?></h3>
      <div class="row skillset-container">
        <?php while( have_rows('skillsets') ) : the_row(); ?>
          <div class="skillset<?php if(get_sub_field('skillset-subsets') === 'oui') { echo ' has-subskillset col-sm-12' ; } else {echo ' col-sm-4'; } echo ' '.strtolower(get_sub_field('skillset-name')); ?>">
            <h4 class="skillset-title"><?php the_sub_field('skillset-name'); ?></h4>
            <?php if(get_sub_field('skillset-subsets') === 'oui') : ?>
              <div class="skill-subset-container"><?php while( have_rows('skillset-subskills') ) : the_row(); ?>
                  <div class="skill-subset"><h5 class="skillset-subtitle"><?php the_sub_field('subset-name'); ?></h5>
                    <?php while( have_rows('subset-skills') ) : the_row(); ?>
                      <div class="skill">
                        <div class="skill-name">
                          <h6><?php the_sub_field('subset-skill-name'); ?></h6><?php if(get_sub_field('subset-skill-since')) { ?><span> - <?php the_sub_field('subset-skill-since'); ?> <?php echo __('ans d\'expérience', 'cc2017'); ?></span><?php } ?>
                        </div>
                        <div class="skill-level">
                          <?php if(get_sub_field('subset-skill-language')) { ?>
                            <?php switch (get_sub_field('subset-skill-level')) {
                              case 'beginner':
                                  echo __('Notions élémentaires', 'cc2017');
                                  break;
                              case 'intermediate':
                                  echo __('Notions professionnelles', 'cc2017');
                                  break;
                              case 'advanced':
                                  echo __('Bilingue', 'cc2017');
                                  break;
                              case 'expert':
                                  echo __('Langue natale', 'cc2017');
                                  break;
                                } ?>
                          <?php } else { ?>
                            <?php switch (get_sub_field('subset-skill-level')) {
                              case 'beginner':
                                  echo __('Débutante', 'cc2017');
                                  break;
                              case 'intermediate':
                                  echo __('Intermédiaire', 'cc2017');
                                  break;
                              case 'advanced':
                                  echo __('Bonne maîtrise', 'cc2017');
                                  break;
                              case 'expert':
                                  echo __('Expertise', 'cc2017');
                                  break;
                                } ?>
                          <?php } ?>
                        </div>
                      </div>
                    <?php endwhile; ?></div>
                <?php endwhile; ?></div>
            <?php else : ?>
              <?php while( have_rows('skillset-skills') ) : the_row(); ?>
                <div class="skill">
                  <div class="skill-name">
                    <h6><?php the_sub_field('skill-name'); ?></h6><?php if(get_sub_field('skill-experience')) { ?><span> - <?php the_sub_field('skill-experience'); ?> <?php echo __('ans d\'expérience', 'cc2017'); ?></span><?php } ?>
                  </div>
                  <div class="skill-level">
                    <?php if(get_sub_field('skill-language')) { ?>
                      <?php switch (get_sub_field('skill-level')) {
                        case 'beginner':
                            echo __('Notions élémentaires', 'cc2017');
                            break;
                        case 'intermediate':
                            echo __('Notions professionnelles', 'cc2017');
                            break;
                        case 'advanced':
                            echo __('Bilingue', 'cc2017');
                            break;
                        case 'expert':
                            echo __('Langue natale', 'cc2017');
                            break;
                          } ?>
                    <?php } else { ?>
                      <?php switch (get_sub_field('skill-level')) {
                        case 'beginner':
                            echo __('Débutante', 'cc2017');
                            break;
                        case 'intermediate':
                            echo __('Intermédiaire', 'cc2017');
                            break;
                        case 'advanced':
                            echo __('Bonne maîtrise', 'cc2017');
                            break;
                        case 'expert':
                            echo __('Expertise', 'cc2017');
                            break;
                          } ?>
                    <?php } ?>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
  </div>
<?php endif; ?>
<?php if( have_rows('work') ): ?>
  <div class="block-content">
      <h3 class="block-title"><?php echo __('Expérience professionnelle', 'cc2017'); ?></h3>
      <div class="timeline experience">
          <div class="row">
              <div class="col-md-12">
                  <div class="exp-holder">
                    <?php while( have_rows('work') ) : the_row(); ?>
                      <div class="exp work">
                          <div class="hgroup">
                              <div class="exp-title"><h4><span><?php the_sub_field('work-title'); ?></span></h4> @ <?php the_sub_field('work-company'); ?></div>
                              <div class="exp-dates"><?php if (!get_sub_field('work-date-end')) { ?>depuis <?php } ?><?php the_sub_field('work-date-start'); ?><?php if (get_sub_field('work-date-end')) { ?> - <?php the_sub_field('work-date-end'); ?><?php } ?></div>
                              <div class="exp-place"><?php the_sub_field('work-place'); ?></div>
                          </div>
                          <?php the_sub_field('work-description'); ?>
                      </div>
                    <?php endwhile; ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
<?php endif; ?>
<?php if( have_rows('education') ): ?>
  <div class="block-content">
      <h3 class="block-title"><?php echo __('Formation', 'cc2017'); ?></h3>
      <div class="timeline education">
          <div class="row">
              <div class="col-md-12">
                  <div class="exp-holder">
                    <?php while( have_rows('education') ) : the_row(); ?>
                      <div class="exp education">
                          <div class="hgroup">
                              <div class="exp-title"><h4><?php the_sub_field('education-title'); ?></h4> | <span><?php the_sub_field('education-school'); ?></span></div>
                              <div class="exp-place"><?php the_sub_field('education-place'); ?></div>
                              <div class="exp-dates"><?php the_sub_field('education-date-start'); ?> - <?php the_sub_field('education-date-end'); ?></div>
                          </div>
                          <?php the_sub_field('education-description'); ?>
                      </div>
                    <?php endwhile; ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
<?php endif; ?>
<?php if( have_rows('services') ): ?>
  <div class="block-content">
    <h3 class="block-title"><?php echo __('Services', 'cc2017'); ?></h3>
    <div class="row">
      <?php while( have_rows('services') ) : the_row(); ?>
        <div class="col-md-4 col-sm-6 service">
            <div class="service-icon">
              <?php if(get_sub_field('service-icon-family') === 'fa') { ?>
                <i class="fa <?php the_sub_field('service-icon-fa'); ?>" aria-hidden="true"></i>
              <?php } elseif (get_sub_field('service-icon-family') === 'linea') { ?>
                <i class="<?php the_sub_field('service-icon-linea'); ?>" aria-hidden="true"></i>
              <?php } else { ?>
                <i class="<?php the_sub_field('service-icon-ionicons'); ?>" aria-hidden="true"></i>
              <?php } ?>
            </div>
            <h4 class="service-title"><?php the_sub_field('service-name'); ?></h4>
            <p><?php the_sub_field('service-description'); ?></p>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
