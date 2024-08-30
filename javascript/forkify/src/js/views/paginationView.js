import View from './View';
import icons from 'url:../../img/icons.svg';

class PaginationView extends View {
  _parentElement = document.querySelector('.pagination');

  addHandlerClick(handler) {
    this._parentElement.addEventListener('click', function (e) {
      const btn = e.target.closest('.btn--inline');

      if (!btn) return;

      const goToPage = +btn.dataset.goto;

      handler(goToPage);
    });
  }

  _generateMarkup() {
    const curPage = this._data.page;
    const numPages = Math.ceil(
      this._data.results.length / this._data.resultsPerPage
    );

    if (curPage === 1 && numPages > 1) {
      return this._generateMarkupButton('next', curPage);
    }

    if (curPage === numPages && numPages > 1) {
      return this._generateMarkupButton('prev', curPage);
    }

    if (curPage < numPages) {
      return `
      ${this._generateMarkupButton('prev', curPage)}
      ${this._generateMarkupButton('next', curPage)}
      `;
    }

    return '';
  }

  _generateMarkupButton(direction, curPage) {
    if (direction === 'next') {
      return `
    <button data-goto="${
      curPage + 1
    }" class="btn--inline pagination__btn--${direction}">
      <span>Page ${curPage + 1}</span>
      <svg class="search__icon">
        <use href="${icons}#icon-arrow-right"></use>
      </svg>
    </button>
    `;
    }
    return `
    <button data-goto="${
      curPage - 1
    }" class="btn--inline pagination__btn--${direction}">
      <svg class="search__icon">
        <use href="${icons}#icon-arrow-left"></use>
      </svg>
      <span>Page ${curPage - 1}</span>
    </button>
    `;
  }
}

export default new PaginationView();
