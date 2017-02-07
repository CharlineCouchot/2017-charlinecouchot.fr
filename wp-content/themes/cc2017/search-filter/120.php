<?php
/**
 * @package WordPress
 * @subpackage SdV Gestion
 */

if ($query->have_posts()) : ?>
    <table class="datatable responsive stripe" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><?php _e('Projet', 'sdv'); ?></th>
                <th><?php _e('Client', 'sdv'); ?></th>
                <th><?php _e('CMS', 'sdv'); ?></th>
                <th><?php _e('Type de site', 'sdv'); ?></th>
                <th><?php _e('Versionning', 'sdv'); ?></th>
                <th><?php _e('Prod.', 'sdv'); ?></th>
                <th><?php _e('Pré.', 'sdv'); ?></th>
                <th><?php _e('Dev.', 'sdv'); ?></th>
                <th><?php _e('Maintenance', 'sdv'); ?></th>
                <th><?php _e('Statut', 'sdv'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <tr>
                    <td>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </td>
                    <td>
                        <?php if(get_field('projet-client')){ ?>
                            <?php $term = get_field('projet-client'); ?>
                            <a href="<?php echo get_term_link( $term ); ?>">
                                <?php echo $term->name;?>
                            </a>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-cms')){ ?>
                            <?php the_field('projet-cms'); ?> 
                        <?php } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-type')){ ?>
                            <?php the_field('projet-type'); ?> 
                        <?php } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-versionning-url')){ echo '<a href="'. get_field('projet-versionning-url') .'" target="_blank">'; } ?>
                            <?php if(!get_field('projet-versionning-autre')){ ?>
                                <?php the_field('projet-versionning'); ?>
                            <?php } else { ?>
                                <?php the_field('projet-versionning-autre'); ?>
                            <?php } ?>
                        <?php if(get_field('projet-versionning-url')){ echo '</a>'; } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-prod-url')){ ?>
                            <?php echo '<a href="//' . get_field('projet-prod-url') . '">' . __("oui", "sdv") . '</a>'; ?>
                        <?php } else { ?>
                            <?php _e("non", "sdv"); ?>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-pre-url')){ ?>
                            <?php echo '<a href="//' . get_field('projet-pre-url') . '">' . __("oui", "sdv") . '</a>'; ?>
                        <?php } else { ?>
                            <?php _e("non", "sdv"); ?>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-dev-url')){ ?>
                            <?php echo '<a href="//' . get_field('projet-dev-url') . '">' . __("oui", "sdv") . '</a>'; ?>
                        <?php } else { ?>
                            <?php _e("non", "sdv"); ?>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-maintenance-etat')){ ?>
                            <div class="label <?php the_field('projet-maintenance-etat'); ?>">
                                <?php if(get_field('projet-maintenance-datefin')){ ?>
                                    <span class="visible"><?php the_field('projet-maintenance-etat'); ?></span>
                                    <span class="hover"><?php echo date("d/m/Y", strtotime(get_field('projet-maintenance-datefin'))); ?></span>
                                <?php } else { ?>
                                    <?php the_field('projet-maintenance-etat'); ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if(get_field('projet-statut')){ ?>
                            <?php the_field('projet-statut'); ?>
                        <?php } ?>
                    </td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>

    <script>
        jQuery(document).ready(function($){
            var table = $('.datatable').DataTable({
                "paging": false,
                "stateSave": true,
                "dom": '<"results__container"<"results__info"i><"results__form filter"f><"results__table"t>>',
                "language": {
                    "sProcessing":        "<?php _e('Traitement en cours...', 'sdv'); ?>",
                    "sSearch":            "",
                    "sSearchPlaceholder": "<?php _e('Rechercher dans le tableau ...', 'sdv'); ?>",
                    "sLengthMenu":        "<?php _e('Afficher _MENU_ r&eacute;sultats', 'sdv'); ?>",
                    "sInfo":              "<?php _e('Affichage des r&eacute;sultats _START_ &agrave; _END_ sur _TOTAL_ ', 'sdv'); ?>",
                    "sInfoEmpty":         "",
                    "sInfoFiltered":      "<?php _e('(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)', 'sdv'); ?>",
                    "sInfoPostFix":       "",
                    "sLoadingRecords":    "<?php _e('Chargement en cours...', 'sdv'); ?>",
                    "sZeroRecords":       "<?php _e('Aucun &eacute;l&eacute;ment &agrave; afficher', 'sdv'); ?>",
                    "sEmptyTable":        "<?php _e('Aucune donn&eacute;e disponible dans le tableau', 'sdv'); ?>",
                    "oPaginate": {
                        "sFirst":         "<?php _e('Premier', 'sdv'); ?>",
                        "sPrevious":      "<?php _e('Pr&eacute;c&eacute;dent', 'sdv'); ?>",
                        "sNext":          "<?php _e('Suivant', 'sdv'); ?>",
                        "sLast":          "<?php _e('Dernier', 'sdv'); ?>"
                    },
                    "oAria": {
                        "sSortAscending":  "<?php _e(': activer pour trier la colonne par ordre croissant', 'sdv'); ?>",
                        "sSortDescending": "<?php _e(': activer pour trier la colonne par ordre d&eacute;croissant', 'sdv'); ?>"
                    }
                },
                "columns": [
                    {responsivePriority: 1, className:"projet"},
                    {responsivePriority: 2, className:"client"},
                    {responsivePriority: 7, className:"cms"},
                    {responsivePriority: 10, className:"type"},
                    {responsivePriority: 9, className:"versionning"},
                    {responsivePriority: 3, className:"prod"},
                    {responsivePriority: 4, className:"pre"},
                    {responsivePriority: 5, className:"dev"},
                    {responsivePriority: 8, className:"maintenance"},
                    {responsivePriority: 6, className:"statut"},
                ]
            });

            new $.fn.dataTable.FixedHeader( table );
        });
    </script>
    
<?php else : ?>
   
    <p class="nocontent"><?php _e( 'Il n\'y a aucun projet pour l\'instant.' ); ?></p>

<?php endif; ?>