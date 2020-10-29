<template>
  <vue-dropzone ref="imgDropzone" id="upload" :options="this.dropzoneOptions" :duplicate-check="true" v-on:vdropzone-file-added="addedFile" v-on:vdropzone-removed-file="removedFile" v-on:vdropzone-error="failedUpload" v-on:vdropzone-max-files-exceeded="maxFilesExceeded">
  </vue-dropzone>
</template>

<script>
import vueDropzone from "vue2-dropzone";
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
export default {
  props: ['temp_url', 'img_ref'],
  data () {
    return {
      is_show:true,
      filename: '',
      options: {
          error: {
              position: 'center',
              timeout: 3000,
          },
      },
      dropzoneOptions: {
          url: this.getUrl(),
          maxFiles: 1,
          acceptedFiles: 'image/*',
          addRemoveLinks: true,
          dictDefaultMessage: "<i class='fa fa-cloud-upload-alt fa-lg'></i><br>LOAD IMAGE",
          headers: {
              'x-csrf-token': jQuery('meta[name=csrf-token]').prop('content'),
          },
      },
    }
  },
  methods:{
    showError: function showError(message) {
      return this.$toast.error(' ', message, this.options.error);
    },
    getUrl() {
        return this.temp_url;
    },
    getFilename: function(){
      return this.filename;
    },
    addFile: function(file){
      this.filename = file.name;
      this.$refs.imgDropzone.manuallyAddFile(file, file.url);
    },
    addedFile: function(file){
      this.filename = file.name;
    },
    removedFile: function(file, error, xhr){
      if (!file.name) { return; }

      this.filename = '';

      let form_data = new FormData();
      form_data.append('name', file.name);
      axios.post(APP_URL + '/delete-temp-file', form_data)
        .catch(function (error) {
            console.error(error);
        });
    },
    maxFilesExceeded: function(file){
      var maxFiles = this.$refs.imgDropzone.options.maxFiles;
      var count = $('.hidden-image').length;
      if (count >= maxFiles) {
        this.showError("File has been rejected because the number of files exceeds the limit.");
        this.$refs.imgDropzone.removeFile(file);
      }
    },
    failedUpload:function(file, message, xhr){
      if (file.type != this.$refs.imgDropzone.options.acceptedFiles) {
        this.$refs.imgDropzone.removeFile(file);
        this.showError(message);
        var media_id = this.$refs.imgDropzone.id;
        this.filename = '';
      }
    },
    removeAllFiles: function(){
      this.$refs.imgDropzone.removeAllFiles();
    }
  },
  mounted: function () {

  },
  components: {
    vueDropzone
  }
};
</script>