<template>
  <div id="q-app">
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style lang="stylus">
$title-color = $grey-4
.wuala-card-title
  padding-top 8px
  padding-bottom 8px
  :first-child
    display inline
    margin-left -27px
    padding 2px 10px 2px 24px
    background $title-color
    color $grey-8
    position relative
    border-radius 3px 5px 5px 0
    font-size 1.25rem
    font-weight 500
    line-height 2rem
    letter-spacing 0.0125em
    &:after
      content ''
      position absolute;
      top 100%
      left 0
      width 0
      height 0
      border 0 solid transparent
      border-top-color darken($title-color, 15%)
      border-width 9px 0 0 11px
.wuala-qtable-title
  .q-table__title
    display inline
    margin-left -27px
    padding 2px 10px 2px 24px
    background $title-color
    color $grey-8
    position relative
    border-radius 3px 5px 5px 0
    font-size 1.25rem
    font-weight 500
    line-height 2rem
    letter-spacing 0.0125em
    &:after
      content ''
      position absolute;
      top 100%
      left 0
      width 0
      height 0
      border 0 solid transparent
      border-top-color darken($title-color, 15%)
      border-width 9px 0 0 11px
</style>
