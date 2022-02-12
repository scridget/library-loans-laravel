describe('Logging In', () => {
    it('fails with invalid email', () => {
        cy.visit('/');
        cy.get('[data-test-id="login.email"]').type('fake@rplloans.org');
        cy.get('[data-test-id="login.password"').type('123456');
        cy.get('[data-test-id="login.submit"').click();
        cy.url().should('equal', 'http://library-loans.test/login');
        cy.get('[data-test-id="login.email.error"]').should('exist');
        cy.get('[data-test-id="login.password.error"]').should('not.exist');
    });

    it('fails with invalid password', () => {
        cy.visit('/');
        cy.get('[data-test-id="login.email"]').type('admin@rplloans.org');
        cy.get('[data-test-id="login.password"').type('493024');
        cy.get('[data-test-id="login.submit"').click();
        cy.url().should('equal', 'http://library-loans.test/login');
        cy.get('[data-test-id="login.email.error"]').should('exist');
        cy.get('[data-test-id="login.password.error"]').should('not.exist');
    });

    it('succeeds with valid credentials', () => {
        cy.visit('/');
        cy.get('[data-test-id="login.email"]').type('admin@rplloans.org');
        cy.get('[data-test-id="login.password"').type('123456');
        cy.get('[data-test-id="login.submit"').click();
        cy.url().should('equal', 'http://library-loans.test/');
        cy.get('[data-test-id="dashboard.title"]').should('have.text', 'Loans');
    });

    it('seemingly sends the password reset link', () => {
        cy.visit('/');
        cy.get('[data-test-id="login.forgot"]').click();
        cy.get('[data-test-id="forgot.email"]').type('admin@rplloans.org');
        cy.get('[data-test-id="forgot.submit"]').click();
        cy.get('[data-test-id="forgot.sent"]').should('have.text', 'Password Reset Email Sent');
    });
});