<template>
    <header class="py-3 border-b">
        <nav class="container mx-auto flex flex-col md:flex-row md:justify-between md:items-center gap-2">
            <Link :href="route('listings.index')" class="font-semibold">Listings</Link>
            <Link :href="route('home')" class="font-bold text-2xl text-indigo-600">Larazillow</Link>

            <div v-if="page.props.user" class="flex flex-col md:flex-row md:items-center gap-1">
                <Link class="btn-transparent" :class="{'bg-orange-300':page.props.notifications_count}" :href="route('notifications.index')"><i class="fa-regular fa-bell"></i> <span v-if="page.props.notifications_count">({{page.props.notifications_count}})</span></Link>
                <Link :href="route('realtor.listings.index')" class="btn-secondary">My listings</Link>
                <Link :href="route('realtor.listings.create')" class="btn-primary">+New Listing</Link>
                <Link :href="route('logout')" method="post" as='button' class="btn-danger">Logout</Link>
            </div>
          
            <div v-else class="flex gap-3">
                <Link :href="route('register')" class="font-semibold">Register</Link>
                <Link :href="route('login')" class="font-semibold">Login</Link>
            </div>
        </nav>
    </header>
 
   
    <div class="w-10/12 mx-auto my-4">
        <div v-if="page.props.session['alert']" class="border border-green-600 bg-green-200 py-3 px-3 rounded my-2">
            {{ page.props.session['alert'] }}
        </div>

        <slot/>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import { usePage } from '@inertiajs/vue3'

    const page = usePage()
</script>

