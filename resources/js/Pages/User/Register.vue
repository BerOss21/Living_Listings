<template>
    <div class="w-full md:w-1/3 mx-auto">
        <form class="w-full" @submit.prevent="register">
            <div>
                <label for="name" class="label">Name</label>
                <input type="text" id="name" v-model="form.name" class="input">
                <span class="validation-error" v-if="form.errors.name">{{ form.errors.name }}</span>
            </div>
            <div class="mt-2">
                <label for="email" class="label">Email</label>
                <input type="email" id="email" v-model="form.email" class="input">
                <span class="validation-error" v-if="form.errors.email">{{ form.errors.email }}</span>
            </div>
            <div class="mt-2">
                <label for="password" class="label">Password</label>
                <input type="password" id="password" v-model="form.password" class="input">
                <span class="validation-error" v-if="form.errors.password">{{ form.errors.password }}</span>
            </div>
            <div class="mt-2">
                <label for="password_confirmation" class="label">Password confirmation</label>
                <input type="password" id="password_confirmation" v-model="form.password_confirmation" class="input">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn-primary w-full">Register</button>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { useForm } from "@inertiajs/vue3";

    const form=useForm({
        name:null,
        email:null,
        password:null,
        password_confirmation:null
    })

    const register=()=>{
        form.submit('post',route('register'))
    }
    
</script>

