import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost/writing_lucy/home');
  await page.getByText('Textbearbeitung').click();
  await page.getByLabel('Schriftart:').selectOption('Impact');
  await page.getByRole('textbox', { name: 'Dein Text:' }).click();
  await page.getByRole('textbox', { name: 'Dein Text:' }).fill('ff');
  await page.getByRole('textbox', { name: 'Hintergrundfarbe:' }).click();
  await page.getByRole('textbox', { name: 'Hintergrundfarbe:' }).fill('#0d0b4e');
  await page.getByLabel('Schriftart:').selectOption('Arial');
});