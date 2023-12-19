<template>
    <div class="w-full md:w-1/3 mx-auto">
        <form class="w-full" @submit.prevent="login">
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
                <button type="submit" class="btn-primary w-full">Login</button>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { useForm } from "@inertiajs/vue3";

    const form=useForm({
        email:null,
        password:null,
    })

    const login=()=>{
        form.submit('post',route('login'))
    }
    
</script>

