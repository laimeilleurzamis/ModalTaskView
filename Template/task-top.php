<?php
$isModal = $this->app->request->isAjax(); 
?>

<style>
    .nav-elem-container {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 8px;
    }
    .btn-nav {
        display: flex;
        background-color: var(--header-background-color);
        align-items: center;
        justify-content: center;
        font-weight: bold;
        border: 1px solid var(--color-lighter);
        height: 26px;
        aspect-ratio: 1 / 1;
        border-radius: 30%;
        text-decoration: none;
    }
    .btn-task-nav:hover {
        background-color: var(--color-lighter);
    }
    .btn-task-nav:active {
        background-color: var(--color-light);
    }
    .icon-nav {
        margin: 0;
        padding: 0 !important;
    }
    #my-panel-close {
        cursor: pointer;
    }
</style>

<?php if ($isModal): ?>
    <div class="nav-elem-container">
        <a href="<?= $this->url->href('TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>" class="btn-nav">
            <i class="fa fa-expand tooltip icon-nav" title="<?= t('open in fullscreen tooltip') ?>"></i>
        </a>
        <a class="btn-nav" id="my-panel-close">
            <i class="fa fa-times tooltip icon-nav" title="<?= t('close tooltip') ?>"></i>
        </a>
    </div>
<?php else: ?>
    <div class="nav-elem-container">
        <a href="<?= $this->url->href('BoardViewController', 'show', array('project_id' => $task['project_id'])) ?>&open_task_id=<?= $task['id'] ?>" class="btn-nav">
            <i class="fa fa-compress tooltip icon-nav" title="<?= t('open in window tooltip') ?>"></i>
        </a>
        <a href="<?= $this->url->href('BoardViewController', 'show', array('project_id' => $task['project_id'])) ?>" class="btn-nav">
            <i class="fa fa-times tooltip icon-nav" title="<?= t('close tooltip') ?>"></i>
        </a>
    </div>
<?php endif; ?>