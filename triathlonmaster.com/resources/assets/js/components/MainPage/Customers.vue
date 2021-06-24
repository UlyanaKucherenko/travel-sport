<template>
  <section class="customers">
    <div class="container">
      <SectionHeader
        :title="vocab.title"
        :desc="vocab.subtitle"
      />
			<div class="customers-cards-grid">
				<div 
					class="customers-card"
					v-for="(card, index) in vocab.cards" :key="index"
				>
					<div class="customers-card__title">
						{{ card.title }}
					</div>
					<div class="customers-card__desc">
						{{ card.desc }}
					</div>
					<div class="customers-card__footer">
						<img 
							class="customers-card__rating"
							src="/img/customers-rating.svg" alt="" 
						>

						<div class="customers-card-author">
							<div class="customers-card-author__name">
								- {{ card.authorName }}
							</div>

							<div class="customers-card-author__company">
								{{ card.authorCompany}}
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
  </section>
</template>

<script>
import vocab from '../../translates/sections/customers';
import SectionHeader from '../SectionHeader'

export default {
  name: "customers",
  components: {SectionHeader},
  props: {
    locale: {
      type: String,
      required: true
    }
  },
  computed: {
    vocab() {return vocab[this.locale]}
  },
}
</script>

<style lang="scss">
  .customers {
    padding: var(--section-offset) 0 calc(var(--section-offset) * 2);
		
		&-cards-grid {
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			column-gap: calc(var(--space-unit) * 4);
			row-gap: calc(var(--space-unit) * 4);

			@media (max-width: 991px) {
				grid-template-columns: 1fr;
			}
		}

		&-card {
			padding: calc(var(--space-unit) * 3);
			background: var(--color-white);
			box-shadow: 0px 5px 15px rgba(70, 70, 70, 0.12);
			border-radius: 20px;

			&__title {
				font-size: var(--text-24);
				margin-bottom: calc(var(--space-unit) * 2);
			}

			&__desc {
				margin-bottom: 10px;
			}

			&__footer {
				display: flex;
				justify-content: space-between;
				align-items: flex-start;
			}

			&-author {
				text-align: right;
			}
		}
  }
</style>