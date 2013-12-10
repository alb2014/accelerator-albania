<?php foreach ($nodes as $node): ?>

    <article>
        <div class="image">
            <?php
                //echo $node['Node']['CustomFields']['thumbnail'];
                if (array_key_exists('thumbnail', $node['CustomFields'])) {
                    echo $this->Html->link($this->Html->image($node['CustomFields']['thumbnail']), $node['Node']['url'], array('escape' => false));
                }
            ?>
        </div>
        <header>
            <p>
                <time pubdate="pubdate">
                    <?php echo $this->Time->format('d.m.Y', $node['Node']['created']); ?>
                </time>
            </p>
            <h1>
                <?php echo $this->Html->link($node['Node']['title'], $node['Node']['url']); ?>
            </h1>
        </header>

        <div class="content">
            <?php echo $this->Text->truncate($node['Node']['body'], 160,array(
                'ending' => '...', 
                'exact' => false,
                'remove' => true,
                'html' => false
            )) ?>
            <?php echo $this->Html->link('Read more', $node['Node']['url']); ?>
        </div>
    </article>

<?php endforeach; ?>
<?php unset($nodes); ?>