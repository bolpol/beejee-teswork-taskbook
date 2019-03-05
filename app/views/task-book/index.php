<section>
    <nav class="navbar">
        <ul class="group">
            <li><?php echo (\App\Models\User::role() === 1)? 'Admin':'NoName';?></li>
        </ul>
    </nav>
    <h1>
        Article content
    </h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><a href="/www/?id=1&order=<?=(empty($_GET['order']))?'ASC':($_GET['order'] === 'ASC')?'DESC':'ASC';?>" >#</a></th>
            <th scope="col"><a href="/www/?id=1&order=<?=(empty($_GET['order']))?'ASC':($_GET['order'] === 'ASC')?'DESC':'ASC';?>&col=name" >Name</a></th>
            <th scope="col"><a href="/www/?id=1&order=<?=(empty($_GET['order']))?'ASC':($_GET['order'] === 'ASC')?'DESC':'ASC';?>&col=email" >Email</a></th>
            <th scope="col">Task</th>
            <th scope="col"><a href="/www/?id=1&order=<?=(empty($_GET['order']))?'ASC':($_GET['order'] === 'ASC')?'DESC':'ASC';?>&col=status" >Status</a></th>
            <?php if(\App\Models\User::role() === 1): ?>
                <th scope="col">&#9873;</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!is_null($items)):
            foreach ($items as $item): ?>
            <tr>
              <th scope="row">
                  <?= $item->id; ?>
              </th>
              <td><?= $item->name; ?></td>
              <td><?= $item->email; ?></td>
              <td><?= (strlen($item->task) > 50)
                      ?substr($item->task, 0, 48).'..'
                      :$item->task; ?></td>
              <td><?= ($item->status === 0)
                      ?'✘'
                      :'✔'; ?></td>
                <?php if(\App\Models\User::role() === 1): ?>
                    <td><a href="/www/task/update/?id=<?= $item->id; ?>"><input type="button" value="C" /></a></td>
                <?php endif; ?>
            </tr>
            <?php
            endforeach;
        endif;
        ?>
        </tbody>
    </table>
    <?php if(isset($paginator)): ?>
        <div class="row justify-content-center">
            <div class="btn btn-link btn-outline-primary">
                <a href="/www/?id=<?= 1; ?>">First</a>
            </div>
            <div class="btn btn-link btn-outline-primary">
                <a href="/www/?id=<?= ($_GET['id']-1 < 1)?1:$_GET['id']-1; ?>"><</a>
            </div>
            <?php for($i=1; $i<=$paginator; $i++):?>
                <div class="btn btn-link btn-outline-primary">
                    <a href="/www/?id=<?= $i; ?>"><?= $i; ?></a>
                </div>
            <?php endfor; ?>
            <div class="btn btn-link btn-outline-primary">
                <a href="/www/?id=<?= ($_GET['id']+1 >= $paginator)?$paginator:$_GET['id']+1; ?>">></a>
            </div>
            <div class="btn btn-link btn-outline-primary">
                <a href="/www/?id=<?= $paginator; ?>">Last</a>
            </div>
        </div>
    <?php endif; ?>
</section>