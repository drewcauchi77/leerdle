# Leerdle

**Leerdle** is a Dutch language learning app built with Laravel and NativePHP Mobile. It offers daily exercises including fill-in-the-blank challenges and AI-powered day-to-day conversations to help users master Dutch. The codebase follows ultra-strict, type-safe development practices with 100% type coverage.

## Prerequisites

- **PHP 8.4+** 
- **Node.js** & **NPM**
- **Laravel Herd** (for local development) or `php artisan serve`
- **ngrok** (for exposing local API)
- **Android Studio** with emulator (for Android/mobile development)

## Development Setup

The application supports simultaneous web and mobile development with isolated build configurations.

### Web Development

For web development, the application uses Inertia.js with Vue 3 and props-based data flow.

1. **Start the Vite dev server (port 5174):**
   ```bash
   npm run dev:web
   ```

2. **Access the application:**
   - Via Laravel Herd: [https://leerdle.test](https://leerdle.test)
   - Via artisan serve: [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

   > **Note for Herd users:** Ensure `variables_order = "GPCS"` is set in your `php.ini` file.

3. **Build for production:**
   ```bash
   npm run build:web
   ```
   Outputs to `public/build-web/`

4. **Expose API via ngrok (if needed):**
   ```bash
   ngrok http --url=allowed-monster-splendid.ngrok-free.app 8000
   ```

### Android/Mobile Development

For mobile development, the application uses NativePHP Mobile with a monolith API architecture.

1. **Open Android Studio emulator** before running commands.

2. **Start the Vite dev server (port 5173):**
   ```bash
   npm run dev:android
   ```
   Creates `public/android-hot` for hot module replacement on the emulator.

   **Alternative:** Use NativePHP's watcher (recommended):
   ```bash
   php artisan native:watch android
   ```

3. **Run the Android app:**
   ```bash
   php artisan native:run android
   ```
   This command will automatically launch the Android emulator if not already running.

4. **Build for production:**
   ```bash
   npm run build:android
   ```
   Outputs to `public/build/`

### Simultaneous Web & Mobile Development

You can develop for both platforms at the same time by running the following in separate terminals:

**Terminal 1 - Web:**
```bash
npm run dev:web
```

**Terminal 2 - Mobile:**
```bash
npm run dev:android
# or: php artisan native:watch android
```

**Terminal 3 - Run Android App:**
```bash
php artisan native:run android
```

Each environment uses isolated build outputs:
- **Web**: Port 5174 → `public/build-web/`
- **Mobile**: Port 5173 → `public/build/` with `android-hot` HMR file

## Debugging

### Android JavaScript Debugging

To debug JavaScript in the Android emulator:

1. Open Chrome and navigate to `chrome://inspect/#devices`
2. Find your device/emulator in the list
3. Click **Inspect** to open Chrome DevTools for real-time console logs and debugging

## Available Commands

### Code Quality
- `composer lint` - Automatically fixes code style issues
  - Runs Laravel Pint in parallel for PHP code formatting
  - Runs Rector for automated PHP refactoring
  - Runs frontend linting (Prettier/ESLint) via `npm run lint`

### Testing

#### Individual Test Suites
- `composer t:coverage` - Ensures **100% type coverage** using Pest's type coverage plugin
  - Runs with `--min=100` to enforce complete type declaration coverage

- `composer t:unit` - Runs Pest unit/feature tests with strict coverage requirements
  - Runs tests in parallel for faster execution
  - Requires **exactly 100% code coverage** (`--exactly=100.0`)

- `composer t:lint` - Validates code style without making changes (CI/CD mode)
  - Runs Laravel Pint in test mode (`--test` flag)
  - Runs Rector in dry-run mode to detect issues without fixing
  - Runs frontend lint checks via `npm run lint:check`

- `composer t:types` - Runs PHPStan static analysis at maximum strictness (level 9)
  - Uses 2GB memory limit for analyzing large codebases

#### Complete Test Suite
- `composer t` - Runs the **complete test suite** in order
  - Code style validation (`t:lint`)
  - Static type analysis (`t:types`)
  - Unit and feature tests with coverage (`t:unit`)
  - Type coverage verification (`t:coverage`)

## License

Leerdle is open-sourced software licensed under the [MIT license](LICENSE).
