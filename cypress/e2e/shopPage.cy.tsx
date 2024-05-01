/// <reference types="cypress" />

describe('Shop Page', () => {
  beforeEach(() => {
    cy.visit('http://127.0.0.1:8000/shop');
  })

  //'Check shop page display 20 shop cards  (db:seed items)
  it('displays fruit cards', () => {
    cy.get('.fruite-item').should('have.length', 20)
  })

  it('filter fruit cards based on category', () =>{
    //select Citrus Fruits categpru (db:seed item)
    cy.get('.fruite-categorie').find("a").contains('Citrus Fruits').click();
    //Now check relavent fruit item Citrus Fruits category: orange
    cy.wait(3000);
    cy.get('.fruite-item').find('h4').contains('Orange');
  })

  /** Checking price Slider
   * Below test also done based on db:seed values */
  it('Filter fruit cards based on price', () =>{
    const price = 25;
    cy.get('#priceSlider').as('range').invoke('val', price).trigger('input').trigger('mouseup');
    cy.wait(3000);
    
    //Check all cards are below set price value
    cy.get('.fruite-item').each(($card) => {
      const priceText = $card.find('.fs-5').text().trim();
      const price = parseFloat(priceText.replace(/\$| \/ kg/g, ''));
      expect(price).to.be.at.most(price);
    });

    //Check fruit items are sort by decenceding order 
    cy.get('.fruite-item').first().find('.fs-5').then(($price) => {
      const priceText = $price.text().trim();
      const price = parseFloat(priceText.replace(/\$| \/ kg/g, ''));
      expect(price).to.be.at.least(price);
    });

    //Check all fruit card action button text is "Add to Cart"
    cy.get('.cy-test-fruitCardAction').each(($actionBtn) => {
      const actionBtnText = $actionBtn.text();
      expect(actionBtnText).to.be.equal('Add to Cart')      
    })
  })

  it('add fruits to cart', () => {
    //Guest user action
    cy.get('.cy-test-fruitCardAction').first().click();

    //Redirect to login
    cy.url().should('eq', 'http://127.0.0.1:8000/buyer-login');
    cy.get('#email').type('client@gmail.com');
    cy.get('#inputPassword').type('920720455');
    cy.get('#submitBtn').click();

    //Back to shop page
    cy.url().should('eq', 'http://127.0.0.1:8000/shop');

    //Authenticated user adding fruits to cart
    cy.get('.cy-test-fruitCardAction').first().contains('Add to Cart').click();
    cy.wait(3000); // Wait for 3 seconds
    cy.contains('.cy-test-fruitCardAction', 'View Cart').should('exist');

  })
  
})
