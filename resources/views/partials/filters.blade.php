<div class="flex items-center space-x-2" x-data="handleFilters()">
    <span>Sort By: </span>
    <form action="/" method="GET" x-ref="filtersform">
        <select name="orderBy" x-model="orderBy" class="rounded border-gray-300" x-on:change="chnageOrderBy">
            <option value="publication_date">Publication Date</option>
            <option value="title">Title</option>
        </select>
        <input type="hidden" name="sort" x-ref="sort" value="{{ request()->query('sort') ?? 'desc' }}" />
    </form>
    <button type="button" x-on:click="changeSort()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" x-show="sort === 'asc'"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" x-show="sort === 'desc'"></path>
        </svg>
    </button>
</div>

<script>
    function handleFilters() {
        return {
            orderBy: "{{ request()->query('orderBy') }}",
            sort: "{{ request()->query('sort') ?? 'desc' }}",
            chnageOrderBy() {
                this.$refs.filtersform.submit();
            },
            changeSort() {
                this.sort = (this.sort === 'desc') ? 'asc' : 'desc';
                this.$refs.sort.value = this.sort;
                this.$refs.filtersform.submit();
            }
        };
    }
</script>