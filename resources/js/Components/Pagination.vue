<template>
    <div class="bg-white py-2 flex items-center justify-between">
        <div class="w-full flex items-center justify-between">
            <div class="text-gray-500 hidden sm:block">
                Showing {{ collection.from }} to {{ collection.to }} entries
            </div>
            <div class="sm:w-auto w-full">
                <nav
                    class="inline-flex sm:justify-end justify-between sm:w-auto w-full"
                >
                    <div class="mx-4">
                        <inertia-link
                            v-if="collection.prev_page_url"
                            :href="collection.prev_page_url"
                            >&larr; Previous</inertia-link
                        >
                        <button
                            class="cursor-not-allowed text-gray-500"
                            v-else
                            disabled
                        >
                            &larr; Previous
                        </button>
                    </div>

                    <div class="ml-4">
                        <inertia-link
                            v-if="collection.next_page_url"
                            :href="collection.next_page_url"
                            >Next &rarr;</inertia-link
                        >
                        <button
                            class="cursor-not-allowed text-gray-500"
                            v-else
                            disabled
                        >
                            Next &rarr;
                        </button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        collection: Object,
    },
};
</script>