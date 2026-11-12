<div class="vacanciesBody">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="vacanciesMeta">
                <h2>Job summary</h2>
                <div class="jobSummary">
                <?php if(get_field('role')){?>
                    <div class="jobMeta">
                        <div class="jobMetaLabel">Job Role</div>
                        <div class="jobMetaInfo"><?php the_field('role');?></div>
                    </div>
                <?php }
                if(get_field('employment_type')){?>
                    <div class="jobMeta">
                        <div class="jobMetaLabel">Employment Type</div>
                        <div class="jobMetaInfo"><?php the_field('employment_type');?></div>
                    </div>
                <?php }
                if(get_field('salary')){?>
                    <div class="jobMeta">
                        <div class="jobMetaLabel">Salary</div>
                        <div class="jobMetaInfo"><?php the_field('salary');?></div>
                    </div>
                <?php }
                if(get_field('qualification')){?>
                    <div class="jobMeta">
                        <div class="jobMetaLabel">Qualifications</div>
                        <div class="jobMetaInfo"><?php the_field('qualification');?></div>
                    </div>
                <?php }
                if(get_field('experience')){?>
                    <div class="jobMeta">
                        <div class="jobMetaLabel">Experience</div>
                        <div class="jobMetaInfo"><?php the_field('experience');?></div>
                    </div>
                <?php }
                 if(have_rows('other_fields')){
                        while(have_rows('other_fields')){
                            the_row();?>
                    <div class="jobMeta">
                        <div class="jobMetaLabel"><?php the_sub_field('label');?>:</div>
                        <div class="jobMetaInfo"><?php the_sub_field('info');?></div>
                    </div>
                            <?php 
                        }
                    }?>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <?php 
            if(get_field('application_type') == 'external' && get_field('external_application')){
                echo '<div class="col-12 text-end">';
                $link = get_field('external_application');
                echo '<a href="'.$link['url'].'" class="button" target="'.$link['target'].'">'.$link['title'].'</a>';
                echo '</div>';
            } elseif(get_field('application_type') == 'internal' && get_field('internal_form')){
                echo '<div class="col-12 text-end">';
                echo '<a href="?apply" class="button">Apply</a>';
                echo '</div>';
            }?>
            <?php the_content(); ?>

            <?php $related_documents = get_field('related_downloads');
                if($related_documents) {                    
                    echo '<div class="row documents">';
                    while(have_rows('related_downloads')) { the_row();
                    $file = get_sub_field('file');
                    ?>
                    <div class="document <?php echo $docs_col_class ?>">
                        <a class="button document-link" href="<?php echo $file['url']; ?>" target="_blank">
                            <?php echo $file['title']; ?>
                        </a>
                    </div>	
                    <?php }
                }?>
        </div>
    </div>
</div>