<style scoped>
  .slug-widget {
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }
  .wrapper {
    margin-left: 8px;
  }
  .slug {
    background-color: #fdfd96;
    padding: 3px 5px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;

  }
  .url-wrapper {
    display: inline-flex;
    align-items: center;
    height: 28px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  #slug-editor {
    min-width: 142px;
    max-width: 300px;
  }

</style>

<template>
  <div class="slug-widget">
    <div class="icon-wrapper wrapper">
      <i class="fa fa-link"></i>
    </div>
    <div class="url-wrapper wrapper">
      <span class="root-url">{{url}}</span
      ><span class="subdirectory-url">/{{subdirectory}}/</span
      ><span class="slug" v-show="slug && !isEditing">{{slug}}</span
      ><input type="text" name="slug" id="slug-editor" class="input is-small" v-show="isEditing" v-model="customSlug" @keyup="adjustWidth"/>
    </div>

    <div class="button-wrapper wrapper">
      <button class="save-slug-button button is-small" v-show="!isEditing" @click.prevent="editSlug">{{slug.length < 1 ? 'Create New Slug' : 'Edit'}}</button>
      <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="saveSlug">{{customSlug == slug ? 'Cancel' : 'Save'}}</button>
      <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="resetEditing">Reset</button>
    </div>
  </div>
</template>

<script>
    export default {
      props: {
        url: {
          type: String,
          required: true
        },
        subdirectory: {
          type: String,
          required: true
        },
        title: {
          type: String,
          required: true
        }
      },
      data: function() {
        return {
          slug: this.setSlug(this.title),
          truncatedSlug: '',
          isEditing: false,
          customSlug: '',
          wasEdited: false,
          api_token: this.$root.api_token
        }
      },
      methods: {
        adjustWidth: function(event) {
          let val = event.target.value;
          let canvas = document.createElement('canvas');
          let ctx = canvas.getContext('2d');
          ctx.font = "14px sans-serif";
          const slugEditorInput = document.getElementById('slug-editor');
          slugEditorInput.style.width = Math.ceil(ctx.measureText(val).width+25)+"px";
        },
        editSlug: function() {
          this.customSlug = this.slug;
          this.$emit('edit', this.slug);
          this.isEditing = true;
        },
        saveSlug: function() {
          const oldSlug = this.slug;
          this.setSlug(this.customSlug);
          if (this.customSlug !== oldSlug) this.wasEdited = true;
          this.$emit('save', this.slug);
          this.isEditing = false;
        },
        resetEditing: function() {
          this.setSlug(this.title);
          this.$emit('reset', this.slug);
          this.wasEdited = false;
          this.isEditing = false;
        },
        setSlug: function(newVal, count = 0) {
          if (newVal === '') return '';
          let slug = Slug(newVal + (count > 0 ? `-${count}` : ''));
          let vm = this;

          if (this.api_token && slug) {
            axios.get('/api/posts/unique', {
              params: {
                api_token: vm.api_token,
                slug: slug
              }
            }).then(function (response) {
              if (response.data) {
                vm.slug = slug;
                vm.$emit('slug-changed', slug)
              } else {
                vm.setSlug(newVal, count+1)
              }
            }).catch(function (error) {
              console.log(error);
            });
          }

        }
      },
      watch: {
        title: _.debounce(function() {
            if (this.wasEdited == false) this.setSlug(this.title);
            // run ajax to see if slug is unique
            // if not unique, customize the slug to make it unique
        }, 500)
      }
    }
</script>
