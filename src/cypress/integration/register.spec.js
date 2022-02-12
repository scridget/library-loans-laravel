describe('Registering', () => {
    it.skip('succeeds and logs in', () => {
        // @TODO: We need to add a DB reset function, so that when this test
        // runs it can use the same credentials every time.
        cy.visit('/register');
        cy.get('[data-test-id="register.name"]').type('Test User');
        cy.get('[data-test-id="register.email"').type('test.user@rplloans.org');
        cy.get('[data-test-id="register.password"').type('123456');
        cy.get('[data-test-id="register.password.confirm"').type('123456');
        cy.get('[data-test-id="register.submit"]').click();
        cy.url().should('equal', 'http://library-loans.test/');
        cy.get('[data-test-id="dashboard.title"]').should('have.text', 'Loans');
        cy.get('[data-test-id="account.menu"]').should('contain.text', 'Test User');
    });

    it.skip('fails with no data', () => {
        // @TODO: This only fails because HTML validation is working first. Not
        // exactly sure how to bypass that and test that our own error handling
        // is succeeding.
        cy.visit('/register');
        cy.get('[data-test-id="register.submit"]').click();
        cy.url().should('equal', 'http://library-loans.test/register');
        cy.get('[data-test-id="register.name.error"]').should('exist');
        cy.get('[data-test-id="register.email.error"]').should('exist');
        cy.get('[data-test-id="register.password.error"]').should('exist');
    });
});