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
    padding: 3px 5px
  }
  .input {
    width: auto;
  }
  .url-wrapper {
    display: flex;
    align-items: center;
    height: 28px;
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
      ><input type="text" name="slug" class="input is-small" v-show="isEditing" v-model="customSlug"/>
    </div>

    <div class="button-wrapper wrapper">
      <button class="save-slug-button button is-small" v-show="!isEditing" @click.prevent="editSlug">Edit</button>
      <button class="save-slug-button button is-small" v-show="isEditing" @click.prevent="saveSlug">Save</button>
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
          slug: this.convertTitle(),
          isEditing: false,
          customSlug: '',
          wasEdited: false
        }
      },
      methods: {
        convertTitle: function() {
          return Slug(this.title)
        },
        editSlug: function() {
          this.customSlug = this.slug;
          this.$emit('edit', this.slug);
          this.isEditing = true;
        },
        saveSlug: function() {
          // run ajax to see if new slug is unique
          if (this.customSlug !== this.slug) this.wasEdited = true;
          this.slug = Slug(this.customSlug);
          this.$emit('save', this.slug);
          this.isEditing = false;
        },
        resetEditing: function() {
          this.slug = this.convertTitle();
          this.$emit('reset', this.slug);
          this.wasEdited = false;
          this.isEditing = false;
        }
      },
      watch: {
        title: _.debounce(function() {
            if (this.wasEdited == false) this.slug = this.convertTitle()
            // run ajax to see if slug is unique
            // if not unique, customize the slug to make it unique
          }, 250),
        slug: function(val) {
          this.$emit('slug-changed', this.slug)
        }
      }
    }
</script>
