import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost/writing_lucy/register');
  await page.getByRole('heading', { name: 'Registrieren' }).click();
  await page.getByRole('textbox', { name: 'E-Mail' }).click();
  await page.getByRole('textbox', { name: 'E-Mail' }).fill('testUser');
  await page.getByRole('button', { name: 'Registrieren' }).click();
});