<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">
        <h3>Buffer Postings

            <?php if($user->plansubs()): ?>
                <?php if($user->plansubs()['plan']->slug == 'proplusagencym' OR $user->plansubs()['plan']->slug == 'proplusagencyy' ): ?>
                    <a href="https://bufferapp.com/oauth2/authorize?client_id=<?php echo e(env('BUFFER_CLIENT_ID')); ?>&redirect_uri=<?php echo e(env('BUFFER_REDIRECT')); ?>&response_type=code" class="btn btn-primary pull-right">Add Buffer Account</a>
                <?php endif; ?>
            <?php endif; ?>




        </h3>

        <div class="row>">
            <div class="col-md-12">
                <form action="<?php echo e(url('buffer-postings/')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="col-md-4">
                        <select name="group_type">
                            <option value="">All Groups</option>
                            <?php $__currentLoopData = $socialPostGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($group->type); ?>"><?php echo e($group->type); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="date">
                    </div>
                    <div>
                        <button type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover social-accounts">
                            <thead>
                            <tr>
                                <th>Group</th>
                                <th>Account Service</th>
                                <th>Post Text</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $bufferPostings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bufferPosting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php
                                    $group = \Bulkly\SocialPostGroups::find($bufferPosting->group_id);?>
                                    <td><?php echo e(isset($group)? $group->name: ''); ?></td>
                                    <td><?php echo e($bufferPosting->account_service); ?></td>
                                    <td><?php echo e($bufferPosting->post_text); ?></td>
                                    <td><?php echo date('d M, Y h:i a', strtotime($bufferPosting->created_at)) ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <?php echo e($bufferPostings->links()); ?>

                </div>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>