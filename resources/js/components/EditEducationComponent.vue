<template>
  <div>
    <h1>Edit Education</h1>
    <form @submit.prevent="updatePost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Post Title:</label>
            <input type="text" class="form-control" v-model="post.title">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Start Date:</label>
              <textarea class="form-control" v-model="post.start_date" rows="5"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>End Date:</label>
            <input type="text" class="form-control" v-model="post.end_date">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Company Name:</label>
            <input type="text" class="form-control" v-model="post.company">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Mission:</label>
            <input type="text" class="form-control" v-model="post.mission">
          </div>
        </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          post: {}
        }
      },
      created() {
        let uri = `http://portfolio.test/api/education/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.post = response.data;
        });
      },
      methods: {
        updatePost() {
          let uri = `http://portfolio.test/api/education/update/${this.$route.params.id}`;
          this.axios.post(uri, this.post).then((response) => {
            this.$router.push({name: 'posts'});
          });
        }
      }
    }
</script>