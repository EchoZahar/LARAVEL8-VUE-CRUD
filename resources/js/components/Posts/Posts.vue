<template>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>posts index page</h2>
        </div>

        <div class="col-md-12" v-if="errors">
            <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>danger !</strong> Posts not downloaded.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>

<!--        <div class="col-md-12">-->
<!--            <div class="alert alert-success alert-dismissible fade show" role="alert">-->
<!--                <strong>success !</strong> You should check in on some of those fields below.-->
<!--                <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--        </div>-->

        <div class="col-md-12" v-else>
            <div v-if="loading" class="spinner-border text-center mt-15" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">title</th>
                    <th scope="col">short description</th>
                    <th scope="col">some action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <th scope="row">{{ post.id }}</th>
                    <td>{{ post.title }} <br>
                        <div v-for="cat in post.categories" :key="cat.slug">
                        <span>Cat: <a href="#">{{ cat.name }}</a></span> <br>
                        </div>

                    </td>
                    <td>{{ post.short_description }} <br>
                        <div class="text-right">
                        author: <a href="#" >{{ post.author.name }}</a><br>
                        date: {{ post.created_at }}
                        </div>
                    </td>
                    <td><button class="btn btn-primary">edit</button>
                        <button class="btn btn-danger">del</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="navbar-dark">
                <ul class="pagination">
                    <li :class="{disabled: !pagination.prev_page_url}" class="page-item">
                        <a @click.prevent="getAllPosts(pagination.prev_page_url)" class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">page: {{ pagination.current_page }} on {{ pagination.last_page}}</a>
                    </li>
                    <li :class="{disabled: !pagination.next_page_url}" class="page-item">
                        <a @click.prevent="getAllPosts(pagination.next_page_url)" class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
           return {
               posts: [],
               post: {
                   id: '',
                   title: '',
                   slug: '',
                   short_description: '',
                   content: '',
                   published: '',
                   author: '',
                   editor: '',
                   created_at: '',
               },
               post_id: '',
               pagination: {},
               edit: false,
               loading: false,
               errors : false
           }
        },
        mounted() {
            this.getAllPosts();
        },
        methods: {
            getAllPosts(page_url) {

                page_url = page_url || '/api/posts';

                axios.get(page_url)
                    .then(response => {
                        this.posts = response.data.data;
                        this.makePagination(response.data);
                        // console.log(response.data);
                    })
                    // .catch(error => console.log(error))
                    .catch(error => {
                        this.errors = true;
                        // console.log(error);
                    });
            },
            makePagination(response) {
                let pagination = {
                    current_page: response.current_page,
                    last_page: response.last_page,
                    prev_page_url: response.prev_page_url,
                    next_page_url: response.next_page_url
                };
                this.pagination = pagination;
            }
        }
    }
</script>
<style>

</style>
