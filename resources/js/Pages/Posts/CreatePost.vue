<template>
    <app-layout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create a post
                </h2>

                <inertia-link
                    :href="route('dashboard')"
                    class="rounded px-8 py-2 border"
                >
                    &laquo; Go Back
                </inertia-link>
            </div>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form @submit.prevent="submit" class="p-6 space-y-6">
                        <div class="space-y-2">
                            <label class="block font-medium" for="title"
                                >Title:</label
                            >
                            <input
                                type="text"
                                v-model="form.title"
                                placeholder="Enter post title"
                                class="w-full border-gray-200 rounded"
                            />

                            <p
                                v-if="form.errors.title"
                                class="text-red-500 text-sm"
                            >
                                {{ form.errors.title }}
                            </p>
                        </div>
                        <div class="space-y-2">
                            <label class="block font-medium" for="description"
                                >Description:</label
                            >
                            <textarea
                                v-model="form.description"
                                rows="6"
                                class="w-full border-gray-200 rounded"
                                placeholder="Enter post description"
                            ></textarea>

                            <p
                                v-if="form.errors.description"
                                class="text-red-500 text-sm"
                            >
                                {{ form.errors.description }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between">
                            <button
                                type="submit"
                                class="bg-indigo-500 text-white px-12 py-3 rounded font-medium"
                            >
                                Submit
                            </button>
                            <inertia-link
                                :href="route('dashboard')"
                                class="rounded px-8 py-2 border"
                            >
                                &laquo; Go Back
                            </inertia-link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AppLayout,
    },
    setup() {
        const form = useForm({
            title: null,
            description: null,
        });

        return { form };
    },
    methods: {
        submit() {
            this.form.post("/dashboard/posts");
        },
    },
};
</script>
