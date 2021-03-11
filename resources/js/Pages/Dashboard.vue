<template>
    <app-layout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    My Posts
                </h2>

                <inertia-link
                    :href="route('posts.create')"
                    class="bg-indigo-500 text-white rounded px-8 py-2"
                >
                    Create Post
                </inertia-link>
            </div>
        </template>

        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-if="posts.data.length">
                        <posts-list :posts="posts" />
                    </div>
                    <div v-else>
                        <no-posts></no-posts>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import PostsList from "@/Components/PostsList.vue";
import NoPosts from "@/Components/NoPosts.vue";

export default {
    props: {
        posts: Object,
    },
    components: {
        AppLayout,
        PostsList,
        NoPosts,
    },
};
</script>
