
# 🧩 Komponentenstruktur: Was kommt wohin?

Diese Übersicht hilft dir, unsere Komponentenbibliothek in Fractal richtig zu nutzen – egal ob du gestaltest, entwickelst oder redaktionell arbeitest.

---

## 🎨 00-Stile

Hier findest du alle **Designgrundlagen**, die sich auf das gesamte System auswirken.  
Wir verwenden **[Tailwind CSS](https://tailwindcss.com/)** – alle Gestaltung erfolgt über Utility-Klassen direkt in den Komponenten.

### Hier gehört rein:
- Farben (z. B. `bg-primary`, `text-gray-700`)
- Schriftgrößen und Typografie (`text-sm`, `font-bold`)
- Abstände, Raster, Layout (`p-4`, `grid`, `gap-6`)
- Responsive Verhalten (`sm:`, `md:`, `lg:`)
- Media (`Icons`, `NW+ Lable`)

### Beispiel:
> „Wie sieht unser Standardabstand aus?“  
> → Durch Tailwind-Utilities wie `p-4`, `gap-6`, `space-y-2`.

---

## 🧱 01-Atome

Die **kleinsten UI-Bausteine**, die für sich alleine funktionieren – z. B. Buttons, Icons oder Links.

### Hier gehört rein:
- `Buttons`
- `Inputfields`
- `Labels`
- `Links`
- `Überschriften`

### Beispiel:
> „Ich brauche einen einheitlichen, klickbaren Button.“

---

## 🧪 02-Moleküle

**Funktionseinheiten**, die aus mehreren Atomen bestehen und gemeinsam eine kleine Aufgabe erfüllen.

### Hier gehört rein:
- Suchfeld (Input + Button)
- Bild mit Beschriftung
- Formularblock

### Beispiel:
> „Ich brauche einen Artikel-Teaser mit Bild, Titel und Lead.“

---

## 🧬 03-Organismen

**Größere Inhaltsbereiche**, die mehrere Moleküle enthalten und **ein ganzes Seitenelement darstellen**.

### Hier gehört rein:
- Header (Logo + Navigation + Suche)
- Footer
- Artikel-Teaser
- Artikelansicht
- Kommentarsektion
- Sidebar

### Beispiel:
> „Wie sieht der vollständige obere Seitenbereich aus?“

---

## 🧩 04-Module?

**Redaktionelle oder funktionale Bausteine**, die an bestimmten Stellen eingefügt werden – oft gesteuert durch das CMS.

### Hier gehört rein:
- Newsletter-Box
- Abo-Komponente
- Adventskalender
- Countdown
- Wahlmodul
- CTA-Boxen

### Beispiel:
> „Die Redaktion will eine interaktive Abo-Box auf der Startseite einbinden.“

---

## 📄 05-Seiten

**Fertige, mit Inhalt befüllte Seitenbeispiele**, die zeigen, wie alle Komponenten zusammenspielen. Sie dienen zur Vorschau, Abnahme oder als Referenz.

### Hier gehört rein:
- Artikeldetailseite mit echtem Inhalt
- Startseite mit Teasern
- Themenseite
- Abo-Abschlussseite
- Fehlerseite (404)

### Beispiel:
> „Wie sieht die echte Themenseite Bundestagswahl aus?“

---

## 🟢 Status von Komponenten

Um den Entwicklungsstand einer Komponente zu erkennen, nutzen wir diese Statusangaben:

| Status               | Bedeutung                                                                 |
|----------------------|---------------------------------------------------------------------------|
| 🔴 **Work in Progress** | Noch nicht implementiert oder in der Umsetzung. Nicht repräsentativ.       |
| 🟡 **Testing**           | Zur internen Prüfung freigegeben (z. B. bei UEBERBIT oder für NW).        |
| 🟢 **Ready**             | Vollständig getestet und freigegeben. Einsatzbereit im Produktivsystem.  |
