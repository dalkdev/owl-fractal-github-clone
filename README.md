# NW Web Components

## Requirements

- Yarn
- Node.js v14

## Setup

- clone and `cd` into this repository
- `yarn`

## Important Commands

`yarn start` starts a dev server with browser sync on port `3000` ([http://localhost:3000](http://localhost:3000))

`yarn build` builds fractal for production into `/build` folder

`yarn clean` removes `/dist` and `/build` folders

`yarn format` will format and check your code using prettier, eslint and stylelint

## Prettier

`yarn prettier --check .` shows you what will be formatted

`yarn prettier --write .` or `yarn format` formats the code according to `.prettierrc.json`

## Pre-Commit Hooks

This project is using Husky pre-commit hooks for staged files:

- prettier formatting
- stylelint
- eslint

> Warning: You are not able to commit if stylelint throws errors!

For more information see `.husky/pre-commit`.

## Editor Config

For _VSCode_ there are several settings set, especially `formatOnSave`. For more information, see `.vscode/settings.json`.

## Browsersync

Fractal comes with Browsersync built in (enabled with `sync` flag in Fractal CLI). This means that clicks, scrolling, live reload etc. are enabled per default. To disable or change the settings, go to [http://localhost:3002](http://localhost:3002).
