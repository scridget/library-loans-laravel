describe('Logging Out', () => {
    it('succeeds', () => {
        // @TODO: Auth behind the scenes, so that we're only testing the log
        // out flow, and not re-testing login
        cy.visit('/');
        cy.get('[data-test-id="login.email"]').type('admin@rplloans.org');
        cy.get('[data-test-id="login.password"').type('123456');
        cy.get('[data-test-id="login.submit"').click();
        cy.url().should('equal', 'http://library-loans.test/');
        cy.get('[data-test-id="dashboard.title"]').should('have.text', 'Loans');
        cy.get('[data-test-id="account.menu"]').click();
        cy.get('[data-test-id="account.logout"]').click();
        cy.url().should('equal', 'http://library-loans.test/login');
    });
});