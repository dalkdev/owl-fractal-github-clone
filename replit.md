# Neue Westfälische Fractal Component Library

## Project Overview
This is a Fractal-based component library for the Neue Westfälische (NW) website. It contains reusable UI components organized in an atomic design structure with atoms, molecules, organisms, and pages.

## Tech Stack
- **Fractal**: Component library framework and development server
- **Vite**: Fast build tool and asset compilation
- **TypeScript**: Type-safe JavaScript development
- **Sass/SCSS**: CSS preprocessing
- **Tailwind CSS**: Utility-first CSS framework (with nw- prefix)
- **Handlebars**: Template engine for components

## Project Structure
```
src/
├── components/
│   ├── atoms/           # Basic building blocks
│   ├── molecules/       # Groups of atoms
│   ├── modules/         # Feature-specific components  
│   ├── organisms/       # Complex UI sections
│   └── pages/          # Full page templates
├── css/                # Sass/SCSS stylesheets
├── js/                 # TypeScript/JavaScript modules
└── static/             # Static assets
```

## Development Environment Setup
- **Development Server**: Fractal UI runs on port 5000
- **Asset Compilation**: Vite runs on port 3042 for hot module replacement
- **Build Output**: Static files are built to `/build` directory

## Key Configuration Files
- `fractal.config.js`: Fractal component library configuration
- `vite.config.ts`: Vite build tool configuration  
- `tailwind.config.js`: Tailwind CSS with custom NW brand colors
- `package.json`: Dependencies and scripts

## Commands
- `npm start`: Start development servers (Fractal + Vite)
- `npm run build`: Build production assets
- `npm run fractal:start`: Start Fractal server only
- `npm run vite:start`: Start Vite dev server only

## Recent Changes
- **2025-09-09**: Successfully configured for Replit environment
  - Fixed Fractal to run on port 5000 for proper proxy routing
  - Updated Vite to use port 3042 for asset compilation  
  - Configured deployment settings for autoscale deployment
  - All development servers now working correctly in Replit

## Deployment
- **Target**: Autoscale deployment (suitable for static/component library sites)
- **Build**: Compiles assets and generates static HTML
- **Run**: Serves the component library via development server

## User Preferences
- Project successfully imported and configured for Replit environment
- No specific coding style preferences noted yet
- Component library approach maintained as designed