<template>
    <div class="container mt-5">
        <div class="row">
            <section v-if="errors" class="col-md-12 mt-5">
                <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ошибка, предупреждение !</strong> Записи не загрузились попробуйте позже.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </section>
            <section v-else class="col-md-12">
                <div v-if="loading"><h6>загрузка</h6></div>
                <h4 class="mt-5">Posts index page</h4>
                <table class="table table-bordered table-responsive-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">title</th>
                        <th scope="col">short description</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="post in posts" :key="post.id">
                        <th scope="row">{{ post.id }}</th>
                        <td>{{ post.title }} <br>
                            <span class="text-info">{{ 'автор: ' + post.author.name }} </span><br>
                            <span class="text-info" v-for="cat in post.categories">категория поста: {{ cat.name }} <br></span>
                        </td>
                        <td>{{ post.short_description }}</td>
                        <td class="text-center"><button class="btn btn-outline-primary">просмотр</button></td>
                    </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li :class="[{ disabled: !pagination.prev_page_url }]"

                            class="page-item">
                            <a href="#" class="page-link" @click.prevent="getPosts(pagination.prev_page_url)">Previous</a>
                        </li>

                        <li class="page-item disabled">
                            <a href="#" class="page-link">{{ pagination.current_page }} из {{ pagination.last_page }}</a>
                        </li>

                        <li :class="[{ disabled: !pagination.next_page_url }]"

                            class="page-item">
                            <a href="#" class="page-link" @click.prevent="getPosts(pagination.next_page_url )">Next</a>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    // данные экземпляра Vue
    data() {
        // возвращаю объект
        return {
            // массив постов
            posts: [],
            // объект с постом
            post: {
                id: '',
                title: '',
                slug: '',
                short_description: '',
                author: '',
                created_at: '',
            },
            // получить id поста
            post_id: '',
            // пагинация по странично
            pagination: {},
            // редактирование записи (позже перенести в админку)
            edit: false,
            // загрузка показать loader
            loading: true,
            // вывести ошибки если есть
            errors: false,
        }
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        // все посты
        getPosts(page_url) {
            // получаю постраничный вывод постов (пагинация) или если нет параметра page_url тогда просто все записи.
            page_url = page_url || '/api/posts';

            axios.get(page_url) // получить все записи по api
                .then(response => {
                    this.posts = response.data.data;
                    this.makePagination(response.data);
                    console.log(response.data) // проверка получения постов
                })
                .catch(error => {
                    console.log(error); // вывод в консоль ошибки.
                    this.errors = true;
                })
                .finally(() => this.loading = false); // вывести ошибки в консоль
        },
        // в makePagination получаю ключи current_page, last_page, next_page_url, prev_page_url из response
        makePagination(response) {
            let pagination = {
                current_page: response.current_page,
                last_page: response.last_page,
                prev_page_url: response.prev_page_url,
                next_page_url: response.next_page_url
            }
            this.pagination = pagination;
            // console.log(response.next_page_url);
        },
    }
}
</script>
