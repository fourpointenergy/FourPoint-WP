<?php
/**
 * Template for displaying the Our History Page
 */
global $theme;
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <header>
  	<h1><?php the_title(); ?></h1>
  	<p><?php the_field('page_description'); ?></p>
  </header>
  <?php
  // check if the repeater field has rows of data
if( have_rows('timeline_items') ): ?>
  <ul id="flipper" class="content_stack">
  <?php
    $counter = 1;
    while ( have_rows('timeline_items') ) : the_row(); ?>
      <li class="<?php if($counter == 1) { echo('already-visible'); } ?>">
        <aside data-bg="bg_<?php echo $counter ?>" style="background-image:url('<?php the_sub_field('timeline_image'); ?>')"><h3><?php the_sub_field('timeline_year') ?></h3></aside>
        <article>
    			<p><?php the_sub_field('timeline_description'); ?></p>
    		</article>
      </li>
<?php
    $counter++;
    endwhile; ?>
</ul>
<?php
endif;
  ?>


<!--
	<li class="already-visible">
		<aside data-bg="bg_1"><h3>2000</h3></aside>
		<article>
			<p>Cordillera Energy Partners was founded in February 2000 and incorporated as a Limited Liability Company formed in the state of Texas. The Company formed by George Solich, President and CEO, and his management team, employed the “acquire/exploit” strategy—buying producing assets and underdeveloped assets in two or three core areas. They enhanced production, cash flow, and reserves through a combination of drilling and lowering the cost structure, while adding additional “bolt-on” acquisitions.</p>
		</article>
	</li>

	<li class="left_year">
		<aside data-bg="bg_2"><h3>2003</h3></aside>
		<article>
			<p>The core areas for Cordillera Energy Partners I (CEP I) were the Anadarko Basin, the Delaware Basin and the San Juan Basin. Through a combination of acquisitions and drilling, CEP I grew its production to 30 MMCFED, annual cash flow to $35 million, and proved reserves to 250 BCFE by mid-2003. In October 2003, CEP I sold its assets to Patina Oil &amp; Gas for cash and warrants to purchase Patina stock valued at $247 million.</p>
		</article>
	</li>

	<li>
		<aside data-bg="bg_3"><h3>2004</h3></aside>
		<article>
			<p>Upon completion of the CEP I sale, the core management team formed CEP II, again with EnCap Investments, seven along-side institutional investors and management. In March of 2004, the company was capitalized with a $200 million private equity investment and a $300 million credit facility from six banks led by JP Morgan Chase. CEP II added to its management team ranks and set out to chart the same “acquire/exploit” strategy that had been so successful in CEP I.</p>
		</article>
	</li>

	<li class="left_year">
		<aside data-bg="bg_4"><h3>2007</h3></aside>
		<article>
			<p>Prior to the sale of CEP II, the management team and CEP’s equity investors elected to form CEP III, LLC, while still managing and operating CEP II so as not to lose momentum, opportunities, or talent. In March of 2007, CEP III was formed with a $500 million equity investment from EnCap Investments, along-side institutional investors and management. CEP III also entered into a $600 million, six bank credit facility again led by JP Morgan Chase.</p>
		</article>
	</li>

	<li>
		<aside data-bg="bg_5"><h3>2008</h3></aside>
		<article>
			<p>Through a combination of focused acquisitions and vertical and horizontal drilling, CEP II grew quickly in both size and value. By mid-2008 CEP II was producing close to 50 MMCFED from 600 wells (97% operated with annual cash flow exceeding $200 million and proved reserves of 725 BCFE.) These high-quality natural gas assets were concentrated in the Texas Panhandle (Douglas, Cleveland, Granite Wash, Atoka, and Morrow), West Central Anadarko Basin, and the East Texas Basin (Cotton Valley Sand, Cotton Valley Lime, Hosston, Pettet, and Travis Peak).<br />
			In September of 2008 CEP II sold all the assets of the company in three separate transactions for total consideration in cash and stock valued at $1.023 billion. The Texas Panhandle and East Texas assets were sold to Forest Oil, the Oklahoma assets to Merit Energy, and the Deep Woodford assets to Devon Energy.</p>
		</article>
	</li>

	<li class="left_year">
		<aside data-bg="bg_6"><h3>2010</h3></aside>
		<article>
			<p>CEP III held assets and operations in the Texas Panhandle, Western Oklahoma, and the East Texas Basin. In 2010 Cordillera celebrated its 10th year in business and made plans to form its fourth enterprise centered around the “acquire/exploit” strategy. During this period, the Cordillera management team executed on both small and large producing property and acreage acquisitions totaling over $700 million and has drilled over 235 wells (vertical and horizontal) investing over $300 million.</p>
		</article>
	</li>

	<li>
		<aside data-bg="bg_7"><h3>2012</h3></aside>
		<article>
			<p>In January of 2012, CEP III agreed to merge with Apache Corporation of Houston, Texas. Under the terms of the agreement, Apache acquired CEP III for $2.85 billion comprised of $600 million in common shares and $2.25 billion in cash. CEP III’s producing property and acreage acquisitions combined with its active drilling program in the Texas Panhandle and Western Oklahoma enabled the company to grow production and cash flow at a compound annual growth rate of 70%. CEP III held one of the leading acreage positions in the Western Anadarko Basin with over 14,000 engineered locations. The merger closed on April 1, 2012, incorporating closing adjustments as well as additional acreage and drilling, Apache paid $3.1 billion. At closing, CEP III delivered close to 330,000 net acres with production over 24,000 BOEPD from over 600 producing wells.</p>
		</article>
	</li>
</ul>
-->
<?php endwhile;// end of the loop. ?>

<?php get_footer(); ?>
