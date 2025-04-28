<?php
// Pagination numérotée personnalisée
			$total_pages = $wp_query->max_num_pages;
			
			if ($total_pages > 1) :
				$current_page = max(1, get_query_var('paged'));
				?>
				<nav class="pagination-nav mt-10 flex flex-wrap justify-center items-center gap-2">
					<?php
					// Lien précédent
					if ($current_page > 1) : ?>
						<a href="<?php echo get_pagenum_link($current_page - 1); ?>" class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-200 rounded transition-colors flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
							</svg>
							<?php _e('Précédent', 'info_gaucho'); ?>
						</a>
					<?php endif; ?>

					<?php
					// Pages numérotées
					$start_pages = max(1, $current_page - 2);
					$end_pages = min($total_pages, $current_page + 2);

					// Toujours afficher la première page
					if ($start_pages > 1) : ?>
						<a href="<?php echo get_pagenum_link(1); ?>" class="px-3 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-200 rounded transition-colors">
							1
						</a>
						<?php if ($start_pages > 2) : ?>
							<span class="px-2 text-neutral-400">...</span>
						<?php endif;
					endif;

					// Boucle pour les pages numérotées
					for ($i = $start_pages; $i <= $end_pages; $i++) :
						if ($i == $current_page) : ?>
							<span class="px-3 py-2 bg-red-700 text-white rounded font-medium">
								<?php echo $i; ?>
							</span>
						<?php else : ?>
							<a href="<?php echo get_pagenum_link($i); ?>" class="px-3 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-200 rounded transition-colors">
								<?php echo $i; ?>
							</a>
						<?php endif;
					endfor;

					// Toujours afficher la dernière page
					if ($end_pages < $total_pages) :
						if ($end_pages < $total_pages - 1) : ?>
							<span class="px-2 text-neutral-400">...</span>
						<?php endif; ?>
						<a href="<?php echo get_pagenum_link($total_pages); ?>" class="px-3 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-200 rounded transition-colors">
							<?php echo $total_pages; ?>
						</a>
					<?php endif; ?>

					<?php
					// Lien suivant
					if ($current_page < $total_pages) : ?>
						<a href="<?php echo get_pagenum_link($current_page + 1); ?>" class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-200 rounded transition-colors flex items-center">
							<?php _e('Suivant', 'info_gaucho'); ?>
							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
						</a>
					<?php endif; ?>
				</nav>
			<?php endif;