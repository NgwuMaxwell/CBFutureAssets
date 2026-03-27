<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel ">
        <div class="content">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 text-<?php echo e($text); ?>">Send Email to users</h1>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <div class="mb-5 row">
                    <div class="col-md-12">
                         <di>
                            <a class='btn btn-primary' href='https://t.me/+VRumJJSKKGdjM2I0'>
                                For help
                            </a>
                        </di>
                        <div class="card p-2 shadow ">
                            <div class="card-body">
                                <form method="post" action="<?php echo e(route('sendmailtoall')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class=" form-group">
                                        <h6 class="text-<?php echo e($text); ?>">Category</h6>
                                        <select class="form-control  text-<?php echo e($text); ?>" id="category"
                                            name="category">
                                            <option value="All">All Users</option>
                                            <option value="No active plans">Users without active investment plan</option>
                                            <option value="No deposit">Users without any Deposit (likely to be new users)
                                            </option>
                                            <option value="Select Users">Choose Users</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-none" id="select-user-view">
                                        <h6 class="text-<?php echo e($text); ?>">Select Users (<span
                                                class="text-primary font-bold" id="numofusers">0</span>)
                                        </h6>
                                        <select onChange="SelectPage(this)" name="users[]" multiple
                                            class="form-control select2  text-<?php echo e($text); ?>" style="width: 100%"
                                            id="showusers"></select>
                                    </div>
                                    <div class=" form-group">
                                        <h6 class="text-<?php echo e($text); ?>">Greeting/Title</h6>
                                        <div class="input-group">
                                            <input type="text" aria-label="Hello" value="Hello" name="greet"
                                                class="form-control">
                                            <input type="text" aria-label="Investor" value="Investor" name="title"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <h6 class="text-<?php echo e($text); ?>">Subject</h6>
                                        <input type="text" name="subject" class="form-control  text-<?php echo e($text); ?>"
                                            placeholder="Subject" required>
                                    </div>
                                    <div class=" form-group">
                                        <textarea placeholder="Type your message here" class="form-control  text-<?php echo e($text); ?> ckeditor" name="message"
                                            row="8" placeholder="Type your message here" required></textarea>
                                    </div>
                                    <div class=" form-group">
                                        <button type="submit" class="btn btn-secondary">
                                            <span>Send</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var category = document.querySelector("#category")
        if (category.value == "Select Users") {
            document.querySelector("#select-user-view").classList.remove("d-none")
        } else {
            document.querySelector("#select-user-view").classList.add("d-none")
        }

        $('.select2').select2();

        function SelectPage(elem) {
            var options = elem.options
            var count = 0
            for (var i = 0; i < options.length; i++) {
                if (options[i].selected) count++;
            }
            document.querySelector("#numofusers").textContent = count;
        }


        category.addEventListener('change', function() {
            if (category.value == "Select Users") {
                document.querySelector("#select-user-view").classList.remove("d-none")

                var users = document.querySelector('#showusers')
                fetch("<?php echo e(route('fetchusers')); ?>")
                    .then(response => response.json())
                    .then(data => {
                        data.data.forEach(element => {
                            var usersopt = document.createElement('option');
                            usersopt.value = element.id;
                            usersopt.innerHTML = element.name;
                            users.appendChild(usersopt);
                        });
                    });

            } else {
                document.querySelector("#select-user-view").classList.add("d-none")
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tradexpro\resources\views/admin/email/index.blade.php ENDPATH**/ ?>