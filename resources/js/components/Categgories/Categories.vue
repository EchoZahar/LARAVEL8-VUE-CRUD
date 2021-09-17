<template>
    <div class="row">
        <div class="col-md-12">
            <h2>categories page</h2>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered table-dark">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Name</th>
                    <th scope="col">post count</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category in categories" :key="category.id">
                    <th scope="row">{{ category.id }}</th>
                    <td>{{ category.name }}</td>
                    <td>posts count: {{ category.posts.length }}</td>
                    <td>
                        <button class="btn btn-primary">edit</button>
                        <button class="btn btn-danger">delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                categories: [],
                category: {
                    id: '',
                    name: '',
                    slug: '',
                    parent_id: '',
                    published: '',
                    created_at: '',
                    posts: '',
                },
                category_id: '',
                edit: false,
                loading: false,
                errors : false
            }

        },
        mounted() {
            this.getCategories();
        },
        methods: {
            getCategories() {
                axios.get('/api/categories')
                    .then(response => {
                        this.categories = response.data;
                        console.log(response.data);
                    })
                    .catch(error => {
                        this.errors = true;
                    });

            }
        }
    }
</script>
<style>

</style>
