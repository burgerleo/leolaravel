<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>vue-table with firebase</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>

  
  
</head>

<body>
  <template id="table-template">
  <div>
    <h1>it's a lazy table</h1>

    <input v-model="search_key"/>
    <button class="btn btn-default" v-for="page in (page_total + 1)" v-on:click="page_index = page - 1">
      @{{ page }}
    </button>    
    <table class="table">
      <thead>
        <th v-for="key in keys">@{{ change_name(key) }}</th>
      </thead>
      <tbody>
        <tr v-for="row in sliced_table_data">
          <td v-for="key in keys">
            <span>@{{ row[key] }}</span>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
  
</template>

<div id="app">
  <lazy_table v-bind:table_data="uuid_data" v-bind:title="config">
  </lazy-_able>
</div>
  <script src='https://www.gstatic.com/firebasejs/4.1.3/firebase.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>

    <script  src="js/test.js"></script>

</body>
</html>
