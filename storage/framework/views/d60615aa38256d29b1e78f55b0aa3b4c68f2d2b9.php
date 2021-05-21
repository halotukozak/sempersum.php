<div class="flex flex-row items-center justify-between py-4 text-gray-500">
    <hr class="w-full mr-2">
        <?php echo e(__('Or')); ?>

    <hr class="w-full ml-2">
</div>

<div class="flex items-center justify-center">
    <?php if(JoelButcher\Socialstream\Socialstream::hasFacebookSupport()): ?>
        <a href="<?php echo e(route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::facebook()])); ?>">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.facebook-icon','data' => ['class' => 'h-6 w-6 mx-2']]); ?>
<?php $component->withName('facebook-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-2']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </a>
    <?php endif; ?>

    <?php if(JoelButcher\Socialstream\Socialstream::hasGoogleSupport()): ?>
        <a href="<?php echo e(route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::google()])); ?>" >
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.google-icon','data' => ['class' => 'h-6 w-6 mx-2']]); ?>
<?php $component->withName('google-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-2']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </a>
    <?php endif; ?>

    <?php if(JoelButcher\Socialstream\Socialstream::hasTwitterSupport()): ?>
        <a href="<?php echo e(route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::twitter()])); ?>">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.twitter-icon','data' => ['class' => 'h-6 w-6 mx-2']]); ?>
<?php $component->withName('twitter-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-2']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </a>
    <?php endif; ?>

    <?php if(JoelButcher\Socialstream\Socialstream::hasLinkedInSupport()): ?>
        <a href="<?php echo e(route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::linkedin()])); ?>">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.linked-in-icon','data' => ['class' => 'h-6 w-6 mx-2']]); ?>
<?php $component->withName('linked-in-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-2']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </a>
    <?php endif; ?>

    <?php if(JoelButcher\Socialstream\Socialstream::hasGithubSupport()): ?>
        <a href="<?php echo e(route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::github()])); ?>">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.github-icon','data' => ['class' => 'h-6 w-6 mx-2']]); ?>
<?php $component->withName('github-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-2']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </a>
    <?php endif; ?>

    <?php if(JoelButcher\Socialstream\Socialstream::hasGitlabSupport()): ?>
        <a href="<?php echo e(route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::gitlab()])); ?>">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.gitlab-icon','data' => ['class' => 'h-6 w-6 mx-2']]); ?>
<?php $component->withName('gitlab-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'h-6 w-6 mx-2']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </a>
    <?php endif; ?>

    <?php if(JoelButcher\Socialstream\Socialstream::hasBitbucketSupport()): ?>
        <a href="<?php echo e(route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::bitbucket()])); ?>">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bitbucket-icon','data' => []]); ?>
<?php $component->withName('bitbucket-icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        </a>
    <?php endif; ?>
</div>
<?php /**PATH /opt/lampp/htdocs/sempersum/resources/views/components/socialstream-providers.blade.php ENDPATH**/ ?>