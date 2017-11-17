// Initialize Firebase
  var config = {
    apiKey: "AIzaSyB2JT3lbUy3jse9TVxWZ_nwnbFzlXW65SM",
    authDomain: "vue-table.firebaseapp.com",
    databaseURL: "https://vue-table.firebaseio.com",
    projectId: "vue-table",
    storageBucket: "vue-table.appspot.com",
    messagingSenderId: "669783489923"
  };
  firebase.initializeApp(config);

var uuiddataRef = firebase.database().ref('uuid_data');
uuiddataRef.on('value', function(snapshot) {
  vm.uuid_data = snapshot.val();
  // console.log(snapshot.val());
});

Vue.component('lazy_table', {
  template: '#table-template',
  props: ['table_data', 'title'],
  data() {
    return {
      page_count: 4,
      page_index: 0,
      search_key: 'green'
    }
    
  },
  computed: {
    keys() {
      return this.table_data
          .map(row => Object.keys(row))
          .reduce((a,b) => a.concat(b), [])
          .filter((item,index,arr) => arr.indexOf(item) == index);
    },
    sliced_table_data() {
      let start = this.page_index * this.page_count;
      let end = (this.page_index + 1) * this.page_count;
      return this.table_data.slice(start, end);
    },
    page_total() {
      return parseInt(this.table_data.length / this.page_count);
    }
  },
  methods: {
    change_name(row_name) {
      var name_list = this.title.map(o =>{
        if (typeof o == 'string') {
          return {
            name: o.split(' -> ')[0],
            as: o.split(' -> ')[1]
          }
        } else {
          return o;
        }
      });
      // console.log(name_list);
      var find_item = name_list.find(item => item.name == row_name );
      if (find_item) {
        return find_item.as;
      } else {
        return row_name;
      }
    }
  }
})

var vm = new Vue({
  el: '#app',
  data: {
    uuid_data: [],
    config: [
      // {
      //   name: 'picture', as: '照片'
      // },
      // {
      //   name: '_id', as: '識別碼'
      // }
      '_id -> 識別碼',
      {name: 'picture', as: '照片'}
    ]
  }
});