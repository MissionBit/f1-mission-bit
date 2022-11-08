<?php
/*
 * Template Name: Styleguide
 *
 * @package F1 Mission Bit
 * @author Factor1 Studios
 * @since 0.0.1
 */

get_header(); ?>

<style>
  .styleguide .container {
    margin-top: 100px;
    padding: 50px 0;
  }

  .styleguide .bg {
    margin: 30px 0;
    padding: 30px;
    background-color: #4949B4;
  }
</style>

<section class="styleguide">
  <div class="container">
    <div class="row">
      <div class="col-8 col-centered">
        <h1>Heading 1</h1>

        <h2>Heading 2</h2>

        <h3>Heading 3</h3>

        <h4>Heading 4</h4>

        <h5>Heading 5</h5>

        <h6>Heading 6</h6>

        <p>Lorem ipsum dolor <a href="#">sit amet</a>, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua</p>

        <div class="buttons">
          <button class="button button--teal">Button Teal</button>

          <button class="button button--red">Button Red</button>

          <button class="button button--navy">Button Navy</button>

          <button class="button button--white-ghost">Button White (Ghost)</button>
        </div>

        <div class="bg">
          <button class="button button--white">Button White</button>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
