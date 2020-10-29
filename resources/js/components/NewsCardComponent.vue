<template>
    <div class="card">
        <a href="javascript:;" data-toggle="modal" :data-target="'#news-'+news.id"><img class="card-img-top img-fluid" :src="news.image.url" :alt="news.title"></a>
        <div class="card-body">
            <a href="javascript:;" data-toggle="modal" :data-target="'#news-'+news.id"><h4 class="card-title mt-0">{{news.title}}</h4></a>
            <p class="card-text">{{news.subtitle}}</p>
            </p>
            <p class="card-text">
                <small class="text-muted">{{news.date}} - Updated {{news.last_time}}</small>
            </p>
            <div class="row">
              <div class="col-lg-2 offset-lg-8"><a href="javascript:;" class="btn btn-outline-secondary btn-sm waves-effect waves-light"><i class="fa fa-edit" @click.prevent="editNews"></i></a></div>
              <div class="col-lg-2"><a href="javascript:;" class="btn btn-outline-danger btn-sm waves-effect waves-light" @click="deleteNews"><i class="fa fa-trash"></i></a>
              </div>
            </div>
        </div>
        <!--  Modal content for the above example -->
        <div :id="'news-'+news.id" class="modal fade bs-new" tabindex="-1" role="dialog" aria-labelledby="New" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title mt-0">{{news.title}}</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h5 class="modal-body">{{news.subtitle}}</h5>
                    <div class="modal-body">
                        <div class="body">
                            <img class="img-fluid" :src="news.image.url" :alt="news.title">
                            <figcaption class="text-muted mb-5">{{news.epigraph}}</figcaption>
                        </div>
                        <div v-html="news.description"></div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>

<script>
    export default {
        props: {
            news: {
                type: Object,
                required: true,
            },
        },
        mounted() {
            console.log('News Card mounted.');
        },
        methods: {
            editNews: function (e) {
                e.preventDefault();
                this.$emit("edit-news", this.news);
            },
            deleteNews: function () {
                this.$emit("delete-news", this.news.id);
            },
        }
    }
</script>
