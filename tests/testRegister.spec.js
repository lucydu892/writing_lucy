// @ts-check
import { test, expect } from '@playwright/test';

test('checkRegister', async ({ page }) => {
  await page.goto('http://localhost/writing_lucy/register');
  await page.getByRole('heading', { name: 'Registrieren' }).isVisible();

  await page.getByLabel('Benutzername').fill('TestUser' + Math.floor(Math.random() * 1000));
  await page.getByLabel('E-Mail').fill('testUser@testing.com');
  await page.getByLabel('Passwort').fill('testPassword');
  await page.getByLabel('Aktzeptier der Allgemeinen Geschäftsbedingungen').check();
  await page.getByRole('button', { name: 'Registrieren' }).click();

  await expect(page.getByText('Du hast dich erfolgreich angemeldet')).toBeVisible();
});
test('!checkRegister', async ({ page }) => {
  await page.goto('http://localhost/writing_lucy/register');
  await page.getByRole('heading', { name: 'Registrieren' }).isVisible();
  await page.getByRole('button', { name: 'Registrieren' }).click();

  // Expect a title "to contain" a substring.
  await expect(page.getByText('Bitte ein Benutzernamen eingeben.')).toBeVisible();
  await expect(page.getByText('Bitte deine E-Mail eingeben.')).toBeVisible();
  await expect(page.getByText('Bitte ein Passwort eingeben.')).toBeVisible();
  await expect(page.getByText('Bitte die Allgemeinen Geschäftsbedingungen annehmen.')).toBeVisible();


});
test('checkRegisterWithExistingUser', async ({ page }) => {
  await page.goto('http://localhost/writing_lucy/register');
  await page.getByRole('heading', { name: 'Registrieren' }).isVisible();

  await page.getByLabel('Benutzername').fill('TestUser');
  await page.getByLabel('E-Mail').fill('testUser@testing.com');
  await page.getByLabel('Passwort').fill('testPassword');
  await page.getByLabel('Aktzeptier der Allgemeinen Geschäftsbedingungen').check();
  await page.getByRole('button', { name: 'Registrieren' }).click();
  // Expect a title "to contain" a substring.
  await expect(page.getByText('Dieser Benutzername existiert bereits.')).toBeVisible();
  });

test('gotoPageRegister', async ({ page }) => {
  await page.goto('http://localhost/writing_lucy/home');

  // Click the get started link.
  await page.getByRole('link', { name: 'Registrieren' }).click();

  // Expects page to have a heading with the name of Installation.
  await expect(page.getByRole('heading', { name: 'Registrieren' })).toBeVisible();
});