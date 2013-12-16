<!-- Here is where we loop through our $ideas array, printing out idea info -->
<?php foreach ($ideas as $idea): ?>

    <article data-date="" data-type="<?php echo $idea['Idea']['type']; ?>" data-votes="<?php echo $idea['Idea']['total_votes']; ?>"<?php if (!$full) {?> class="simplified"<?php }?>>
        <header>
            <h1><?php echo $this->Html->link($idea['Idea']['name'],
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id'])); ?></h1>
            <?php if ($full) {?>
                <p><time pubdate="pubdate">
                    <?php echo $this->Time->format('d.m.Y', $idea['Idea']['date_created']); ?>
                </time></p>
            <?php } ?>
        </header>

        <?php echo $this->element('Accelerator.votes', array("idea" => $idea)); ?>

        <div>
            <p class="description"><?php echo $idea['Idea']['desc']; ?></p>

        <?php if ($full) {?>
            <aside>
                <?php echo $this->Html->link('Comment',
array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id'], '#' => 'comments'), array('class' => 'share_comment')); ?>
                <a class="share_fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($this->Html->url( array('plugin' => 'accelerator', 'controller' => 'ideas', 'action' => 'view', $idea['Idea']['id']), true )); ?>" target="_blank">
                    Share on Facebook
                </a>
            </aside>
        <?php } ?>

        
        </div>

    </article>

<?php endforeach; ?>
<?php unset($ideas); ?>