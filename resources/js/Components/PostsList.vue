<template>
    <div class="space-y-4 p-6">
        <div class="border rounded-lg overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left px-6 py-4">ID</th>
                        <th class="text-left px-6 py-4">Title</th>
                        <th class="text-right px-6 py-4">Publication date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="border-t"
                        v-for="post in posts.data"
                        :key="post.id"
                    >
                        <td class="text-left px-6 py-4">{{ post.id }}</td>
                        <td class="text-left px-6 py-4">{{ post.title }}</td>
                        <td class="text-right px-6 py-4">
                            {{ formatDate(post.publication_date) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <pagination :collection="posts"></pagination>
    </div>
</template>

<script>
import Pagination from "@/components/Pagination";

export default {
    props: {
        posts: Object,
    },
    components: { Pagination },
    methods: {
        formatDate(value) {
            const date = new Date(value);

            return date.toLocaleString().toUpperCase();
        },
    },
};
</script>