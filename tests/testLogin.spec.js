// @ts-check
import { test, expect } from '@playwright/test';

test('gotoPageLogin', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/home');
    await page.getByRole('link', { name: 'Anmelden' }).click();
    await expect(page.getByRole('heading', { name: 'Login' })).toBeVisible();
});
test('checkLogin', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/login');
    
    await page.getByLabel('Benutzername').fill('TestUser')
    await page.getByLabel('Passwort').fill('testPassword')

    await page.getByRole('button', { name: 'Login' }).click();

    await page.getByText('Login erfolgreich.').isVisible();

    await expect(page.getByRole('link', { name: 'Meine Beiträge' })).toBeVisible();
    await expect(page.getByRole('link', { name: 'Abmelden' })).toBeVisible();
    await expect(page.getByRole('link', { name: 'Anmelden' })).not.toBeVisible();
    await expect(page.getByRole('link', { name: 'Registrieren' })).not.toBeVisible();
    await expect(page.getByRole('button', { name: 'Speichern' })).toBeVisible();

});
test('checkLoginPage', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/login');

    await page.getByRole('link', { name: 'Registrieren' }).last().click();

    await expect(page.getByRole('heading', { name: 'Registrieren' })).toBeVisible();
});
test('checkWrongInputPassword', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/login');
    
    await page.getByLabel('Benutzername').fill('TestUser')
    await page.getByLabel('Passwort').fill('testPassword123')

    await page.getByRole('button', { name: 'Login' }).click();

    await expect(page.getByText('Benutzername oder Passwort ist falsch.')).toBeVisible();
});
test('checkWrongInputUsername', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/login');
    
    await page.getByLabel('Benutzername').fill('test')
    await page.getByLabel('Passwort').fill('testPassword')

    await page.getByRole('button', { name: 'Login' }).click();

    await expect(page.getByText('Benutzername oder Passwort ist falsch.')).toBeVisible();
});
test('checkLoginEmpty', async ({ page }) => {
    await page.goto('http://localhost/writing_lucy/login');
    
    await page.getByRole('button', { name: 'Login' }).click();

    await expect(page.getByText('Bitte dein Benutzernamen eingeben.')).toBeVisible();
    await expect(page.getByText('Bitte dein Passwort eingeben.')).toBeVisible();
});
