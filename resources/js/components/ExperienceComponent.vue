<template>
  <div>
      <h1>Experience</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'createex' }" class="btn btn-primary">New Experience</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Company</th>
                <th>Mission</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.id }}</td>
                    <td>{{ post.title }}</td>
                    <td>{{ post.start_date }}</td>
                    <td>{{ post.end_date }}</td>
                    <td>{{ post.company }}</td>
                    <td>{{ post.mission }}</td>
                    <td><router-link :to="{name: 'editex', params: { id: post.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deletePost(post.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          posts: []
        }
      },
      created() {
      let uri = 'http://portfolio.test/api/experiences';
      this.axios.get(uri).then(response => {
        this.posts = response.data.data;
      });
      },
      methods: {
        deletePost(id)
        {
            let uri = `http://portfolio.test/api/experience/delete/${id}`;
            this.axios.delete(uri).then(response => {
            this.posts.splice(this.posts.indexOf(id), 1);
            });
        }
      }
    
  }
</script>
